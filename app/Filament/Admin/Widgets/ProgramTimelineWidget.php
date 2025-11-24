<?php

namespace App\Filament\Admin\Widgets;

use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Widgets\Widget;
use App\Models\Program;
use App\Models\Year;
use App\Models\Unit;

class ProgramTimelineWidget extends Widget implements Forms\Contracts\HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.admin.widgets.program-timeline-widget';

    public array $months = [];
    public array $weeks = ['W1', 'W2', 'W3', 'W4'];
    public array $data = [];

    public ?int $selectedYear = null;
    public ?int $selectedUnit = null;

    public ?int $activeYearId = null;
    public ?int $activeYearValue = null;

    public function mount(): void
    {
        // Month labels
        $this->months = [
            1 => 'January', 2 => 'February', 3 => 'March',
            4 => 'April',   5 => 'May',      6 => 'June',
            7 => 'July',    8 => 'August',   9 => 'September',
            10 => 'October',11 => 'November',12 => 'December',
        ];

        // Active year
        $activeYear = Year::where('status', 1)->first()
            ?? Year::where('year', now()->year)->first()
            ?? Year::orderByDesc('year')->first();

        $this->activeYearId = $activeYear?->id;
        $this->activeYearValue = $activeYear?->year;

        // Fill default filter state
        $this->selectedYear = $this->activeYearId;
        $this->selectedUnit = null;

        // Fill form
        $this->form->fill([
            'selectedYear' => $this->selectedYear,
            'selectedUnit' => $this->selectedUnit,
        ]);

        $this->loadData();
    }

    /**
     * ----- FILTER FORM -----
     */
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Select::make('selectedYear')
                        ->label('Tahun')
                        ->options(
                            Year::orderBy('year')->pluck('year', 'id')
                        )
                        ->default($this->selectedYear)
                        ->reactive()
                        ->afterStateUpdated(fn () => $this->loadData()),

                    Forms\Components\Select::make('selectedUnit')
                        ->label('Unit')
                        ->options(
                            Unit::orderBy('unit')->pluck('unit', 'id')
                        )
                        ->default($this->selectedUnit)
                        ->reactive()
                        ->afterStateUpdated(fn () => $this->loadData()),
            ])
        ];
    }

    /**
     * ----- MAIN LOADER -----
     */
    public function loadData(): void
    {
        // --- STOP: Jangan tampilkan data jika filter belum dipilih ---
        if (!$this->selectedYear || !$this->selectedUnit) {
            $this->data = [];
            return;
        }

        $query = Program::with('unit');

        // FILTER TAHUN
        $query->where('year_id', $this->selectedYear);

        // FILTER UNIT
        $query->where('unit_id', $this->selectedUnit);

        $programs = $query->orderBy('unit_id')
            ->orderBy('start_month')
            ->orderBy('start_week')
            ->get();

        /**
         * Karena hanya 1 unit → langsung tampilkan untuk unit tersebut
         */
        $unit = Unit::find($this->selectedUnit);
        $unitName = $unit?->unit ?? 'Unit';

        $this->data = [
            $unitName => $programs
        ];
    }


    /**
     * Color Helper
     */
    public function getProgramColor($programId): string
    {
        $colors = [
            'bg-blue-400', 'bg-green-400', 'bg-yellow-400', 'bg-red-400',
            'bg-purple-400', 'bg-pink-400', 'bg-indigo-400', 'bg-teal-400',
        ];

        return $colors[$programId % count($colors)];
    }
}
