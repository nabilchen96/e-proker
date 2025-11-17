<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\YearResource\Pages;
use App\Filament\Admin\Resources\YearResource\RelationManagers;
use App\Models\Year;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class YearResource extends Resource
{
    protected static ?string $model = Year::class;

    protected static ?string $navigationGroup = 'Master';
    protected static ?string $navigationIcon = 'heroicon-c-calendar-date-range';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('year')
                        ->label('Tahun')
                        ->placeholder('Masukkan tahun, contoh: 2025')
                        ->numeric()
                        ->minValue(2000)
                        ->maxValue(2100)
                        ->required(),

                    Forms\Components\Select::make('status')
                        ->label('Status')
                        ->options([
                            'aktif' => 'Aktif',
                            'tidak aktif' => 'Tidak Aktif',
                        ])
                        ->required()
                        ->placeholder('Pilih status'),
                ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'aktif',
                        'danger' => 'tidak aktif',
                    ])
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('year', 'desc')
            ->searchPlaceholder('Cari tahun...')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListYears::route('/'),
            'create' => Pages\CreateYear::route('/create'),
            'edit' => Pages\EditYear::route('/{record}/edit'),
        ];
    }

    protected static ?int $navigationSort = 3;

}
