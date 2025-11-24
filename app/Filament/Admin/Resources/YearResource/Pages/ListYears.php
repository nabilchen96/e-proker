<?php

namespace App\Filament\Admin\Resources\YearResource\Pages;

use App\Filament\Admin\Resources\YearResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListYears extends ListRecords
{
    protected static string $resource = YearResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getMaxContentWidth(): ?string
    {
        return 'full';
    }
}
