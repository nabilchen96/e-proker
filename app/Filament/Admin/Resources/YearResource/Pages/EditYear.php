<?php

namespace App\Filament\Admin\Resources\YearResource\Pages;

use App\Filament\Admin\Resources\YearResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditYear extends EditRecord
{
    protected static string $resource = YearResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
