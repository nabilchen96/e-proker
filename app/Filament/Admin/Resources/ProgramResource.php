<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProgramResource\Pages;
use App\Filament\Admin\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Aktivitas';
        

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Program Information')
                    ->schema([
                        Forms\Components\Select::make('unit_id')
                            ->label('Unit')
                            ->relationship('unit', 'unit')
                            ->required(),

                        Forms\Components\Select::make('year_id')
                            ->label('Year')
                            ->relationship('year', 'year')
                            ->required(),

                        Forms\Components\TextInput::make('title')
                            ->label('Program Title')
                            ->required(),

                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->rows(4),
                        Forms\Components\Select::make('start_month')
                            ->label('Start Month')
                            ->options(self::monthOptions())
                            ->required(),

                        Forms\Components\Select::make('start_week')
                            ->label('Start Week')
                            ->options([
                                1 => 'Week 1',
                                2 => 'Week 2',
                                3 => 'Week 3',
                                4 => 'Week 4',
                                // 5 => 'Week 5',
                            ])
                            ->required(),

                        Forms\Components\Select::make('end_month')
                            ->label('End Month')
                            ->options(self::monthOptions())
                            ->required(),

                        Forms\Components\Select::make('end_week')
                            ->label('End Week')
                            ->options([
                                1 => 'Week 1',
                                2 => 'Week 2',
                                3 => 'Week 3',
                                4 => 'Week 4',
                                // 5 => 'Week 5',
                            ])
                            ->required(),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'Belum' => 'Belum',
                                'Proses' => 'Proses',
                                'Selesai' => 'Selesai',
                            ])
                            ->required(),

                    ])->columns(2),

                Forms\Components\Hidden::make('created_by')
                    ->default(fn () => auth()->id()),
            ]);
    }

    public static function monthOptions()
    {
        return [
            1 => 'January', 2 => 'February', 3 => 'March',
            4 => 'April', 5 => 'May', 6 => 'June',
            7 => 'July', 8 => 'August', 9 => 'September',
            10 => 'October', 11 => 'November', 12 => 'December',
        ];
    }

    // ⬇️ Tambahkan DI SINI
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->select('programs.*');
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->wrap() // Memungkinkan teks turun ke bawah
                    ->searchable()
                    ->width('300px'),

                Tables\Columns\TextColumn::make('unit.unit')
                    ->label('Unit')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('year.year')
                    ->label('Year'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Schedule')
                    ->formatStateUsing(fn ($record) =>
                        "Month {$record->start_month} [Week {$record->start_week}] → Month {$record->end_month} [Week {$record->end_week}]"
                    ),
                
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'danger' => 'Belum',
                        'warning' => 'Proses',
                        'success' => 'Selesai',
                    ])
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('unit_id')
                    ->label('Filter Unit')
                    ->relationship('unit', 'unit')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('year_id')
                    ->label('Filter Tahun')
                    ->relationship('year', 'year')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }

    protected static ?int $navigationSort = 4;
}
