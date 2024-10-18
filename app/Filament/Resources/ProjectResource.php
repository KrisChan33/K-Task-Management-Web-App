<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Support\Markdown;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Date;

use function Laravel\Prompts\text;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Project Management';

    
    public static function form(Form $form): Form
    {
        return $form
        
        ->schema([
            Split::make([
            Section::make('Create New Project')->description('Fill out the form below to create a new project. Provide the project name and other necessary details to get started.')
                ->schema([
                    TextInput::make('name')
                        ->label('Name')
                        ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Enter the name of the project.')
                        ->required(),
                    
                        Select::make('status')
                        ->label('Status')
                        ->options([
                            'not-started' => 'Not Started',
                            'in-progress' => 'In Progress',
                            'completed' => 'Completed',
                        ])
                        ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Select the current status of the project.')
                        ->default('not-started')
                        ->required(),
                    DatePicker::make('start_date')
                        ->label('Start Date')
                        ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Select the start date of the project.')
                        ->required(),
                    DatePicker::make('end_date')
                        ->label('End Date')
                        ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Select the end date of the project.')
                        ->required(),
                    Textarea::make('description')
                        ->label('Description')
                        ->columnSpanFull()
                        ->rows(10)
                        ->cols(20)
                        ->autosize()
                        ->minLength(2)
                        ->maxLength(1024)
                        ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Provide a detailed description of the project. The description should be between 2 and 1024 characters.')
                        ->required(),
            ]),


            Fieldset::make('Metadata')->schema([
                Placeholder::make('start_date')
                    ->content(fn (?Project $record): string => optional($record)->start_date?->toFormattedDateString() ?? 'N/A'),
                    
                    Placeholder::make('end_date')
                    ->content(fn (?Project $record): string => optional($record)->start_date?->toFormattedDateString() ?? 'N/A'),
                        
                    Placeholder::make('created_at')
                    ->content(fn (?Project $record): string => optional($record)->created_at?->toFormattedDateString() ?? 'N/A'),
                    
                    Placeholder::make('updated_at')
                    ->content(fn (?Project $record): string => optional($record)->updated_at?->toFormattedDateString() ?? 'N/A'),
                    
            ])->grow(false)->columnSpanFull(),

        ])->from('sm')->columnSpanFull(),

            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->icon('heroicon-o-user')
                    ->iconPosition('before')
                    ->searchable()
                    ->iconColor('primary')
                    ->sortable('asc'),
                TextColumn::make('description')
                    ->searchable()
                    ->sortable()
                    ->limit(20)
                    ->label('Description'),
                TextColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->label('Status'),
                TextColumn::make('start_date')
                    ->searchable()
                    ->sortable()
                    ->label('Start Date'),
                TextColumn::make('end_date')
                    ->searchable()
                    ->sortable()
                    ->label('End Date'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
