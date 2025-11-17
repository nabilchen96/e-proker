<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Program;
use Carbon\Carbon;
use Filament\Widgets\Widget;

class ProgramTimelineWidget extends Widget
{
    protected static string $view = 'filament.admin.widgets.program-timeline-widget';

    protected int | string | array $columnSpan = 'full';

    public function getPrograms()
    {
        return Program::with('unit')
            ->orderBy('unit_id')
            ->orderBy('start_date')
            ->where('unit_id', 1)
            ->get();
    }

    public function getMonths()
    {
        $currentYear = now()->year;
        
        return collect(range(1, 12))->map(function ($month) use ($currentYear) {
            $date = Carbon::create($currentYear, $month, 1);
            return [
                'num' => $month,
                'name' => $date->translatedFormat('F'),
                'year' => $currentYear,
                'weeks' => [1, 2, 3, 4],
            ];
        });
    }

    public function isInWeek($start, $end, $month, $week)
    {
        $year = now()->year;
        
        $weekRanges = [
            1 => [1, 7],
            2 => [8, 14],
            3 => [15, 21],
            4 => [22, 31],
        ];

        [$dStart, $dEnd] = $weekRanges[$week];

        $cellStart = Carbon::create($year, $month, $dStart)->startOfDay();
        $cellEnd = Carbon::create($year, $month, $dEnd)->endOfDay();

        return $start->between($cellStart, $cellEnd) ||
               $end->between($cellStart, $cellEnd) ||
               ($start <= $cellStart && $end >= $cellEnd);
    }
}