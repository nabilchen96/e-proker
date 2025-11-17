<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\Widget;
use App\Models\Program;
use App\Models\Year;
use Illuminate\Support\Collection;

class ProgramTimelineWidget extends Widget
{
    protected static string $view = 'filament.admin.widgets.program-timeline-widget';

    public array $months = [];
    public array $weeks = ['W1', 'W2', 'W3', 'W4'];
    public array $data = [];
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

        // Find active year
        $activeYear = Year::where('status', 1)->first()
            ?? Year::where('year', now()->year)->first()
            ?? Year::orderByDesc('year')->first();

        if ($activeYear) {
            $this->activeYearId = $activeYear->id;
            $this->activeYearValue = $activeYear->year;
        } else {
            $this->activeYearId = null;
            $this->activeYearValue = now()->year;
        }

        // Get programs
        $query = Program::with('unit');

        if ($this->activeYearId) {
            $query->where('year_id', $this->activeYearId);
        }

        $programs = $query->orderBy('unit_id')
            ->orderBy('start_month')
            ->orderBy('start_week')
            ->get();

        // Group by unit
        $grouped = [];
        foreach ($programs as $p) {
            $unitName = $p->unit?->unit ?? $p->unit?->name ?? 'Umum';
            if (!isset($grouped[$unitName])) {
                $grouped[$unitName] = collect();
            }
            $grouped[$unitName]->push($p);
        }

        $this->data = $grouped;
    }

    // Helper method untuk mendapatkan warna acak untuk program
    public function getProgramColor($programId): string
    {
        $colors = [
            'bg-blue-400', 'bg-green-400', 'bg-yellow-400', 'bg-red-400',
            'bg-purple-400', 'bg-pink-400', 'bg-indigo-400', 'bg-teal-400',
            'bg-orange-400', 'bg-cyan-400', 'bg-lime-400', 'bg-amber-400',
        ];
        
        return $colors[$programId % count($colors)];
    }
}