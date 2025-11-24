<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use App\Filament\Admin\Widgets\ProgramTimelineWidget;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.admin.pages.dashboard';
    protected static ?string $navigationLabel = 'Dashboard';

    // Method untuk get widgets
    protected function getWidgets(): array
    {
        return [
            ProgramTimelineWidget::class,
        ];
    }

    // Method untuk header widgets
    protected function getHeaderWidgets(): array
    {
        return [
            ProgramTimelineWidget::class,
        ];
    }

    // Untuk full width - HARUS PUBLIC
    public function getHeaderWidgetsColumns(): int | array
    {
        return 1;
    }

    // Atau alternatif: gunakan method ini untuk mengatur grid columns
    public function getHeaderWidgetsGrid(): array
    {
        return [
            'default' => 1,
            'md' => 1,
            'xl' => 1,
        ];
    }

    public function getMaxContentWidth(): ?string
    {
        return 'full';
    }
}