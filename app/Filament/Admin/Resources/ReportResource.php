<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReportResource\Pages;
use App\Filament\Admin\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ReportResource extends Resource
{
    protected static ?string $model = Report::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Reports';
    protected static ?string $pluralLabel = 'Reports';
    protected static ?string $navigationGroup = 'Aktivitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Report Information')
                    ->schema([
                        // Forms\Components\Select::make('program_id')
                        //     ->label('Program')
                        //     ->relationship('program', 'title') // asumsikan kolom title ada di programs
                        //     ->searchable()
                        //     ->required(),

                        Forms\Components\Select::make('program_id')
                            ->label('Program')
                            ->searchable()
                            ->required()
                            ->getSearchResultsUsing(function (string $search) {
                                return \App\Models\Program::query()
                                    ->where('title', 'like', "%{$search}%")
                                    ->orWhereHas('unit', fn ($q) => 
                                        $q->where('unit', 'like', "%{$search}%")
                                    )
                                    ->orWhereHas('year', fn ($q) =>
                                        $q->where('year', 'like', "%{$search}%")
                                    )
                                    ->limit(50)
                                    ->get()
                                    ->mapWithKeys(function ($program) {
                                        return [
                                            $program->id => "{$program->title} – {$program->unit->unit} – {$program->year->year}"
                                        ];
                                    });
                            })
                            ->getOptionLabelUsing(function ($value) {
                                $program = \App\Models\Program::find($value);

                                return $program
                                    ? "{$program->title} – {$program->unit->unit} – {$program->year->year}"
                                    : null;
                            })
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $program = \App\Models\Program::find($state);
                                $set('unit_id', $program?->unit_id);
                            }),


                        Forms\Components\Textarea::make('summary')
                            ->label('Penjelasan Kegiatan')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('file_path')
                            ->label('Lampiran')
                            ->directory('reports')
                            ->acceptedFileTypes(['application/pdf', 'image/*'])
                            ->maxSize(5120)
                            ->nullable(),

                ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('program.title')
                    ->label('Program')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('summary')
                    ->label('Summary')
                    ->limit(40),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Uploaded At')
                    ->dateTime('d M Y H:i'),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }

        protected static ?int $navigationSort = 5;
}
