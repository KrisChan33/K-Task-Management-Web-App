<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers\TasksRelationManager;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Doctrine\DBAL\SQL\Builder\SelectSQLBuilder;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\MaxWidth;
use Filament\Support\Markdown;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

use function Laravel\Prompts\text;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Project Management';
    protected static ?string $label = 'All Projects';
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Split::make([
            Section::make('Project Details')->description('Fill out the form below to create a new project. Provide the project name and other necessary details to get started.')
                // ->label('Project Details')
            ->schema([
                    TextInput::make('name')
                        ->label('Project Name')
                        ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Enter the name of the project.')
                        ->columnSpan(8)
                        ->required(),
                        Select::make('status')
                        ->label('Status')
                        ->options([
                            'Not Started' => 'Not Started',
                            'In Progress' => 'In Progress',
                            'Completed' => 'Completed',
                        ])
                        ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Select the current status of the project.')
                        ->columnSpan(4)
                        ->default('Not Started')
                        ->required(),
                    Textarea::make('description')
                        ->label('Description')
                        ->columnSpanFull()
                        ->rows(10)
                        ->cols(20)
                        ->autosize()
                        ->columnSpan(12)
                        ->minLength(2)
                        ->maxLength(1024)
                        ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Provide a detailed description of the project. The description should be between 2 and 1024 characters.')
                        ->required(),
            ])->columns(12)->columnSpanFull(),

            Fieldset::make('Metadata')->schema([
                                Placeholder::make('user_id')
                                    ->label('User ID')
                                    ->content(fn ($record) => $record->user_id ?? 'None'),
                                Placeholder::make('user.name')
                                    ->label('Created By')
                                    ->content(fn ($record) => $record->user->name ?? 'None'),
                                Placeholder::make('created_at')
                                    ->content(fn (?Project $record): string => optional($record)->created_at?->toFormattedDateString() ?? 'None'),
                                Placeholder::make('updated_at')
                                    ->content(fn (?Project $record): string => optional($record)->updated_at?->toFormattedDateString() ?? 'None'),
                            ])->grow(false)->columnSpan(12),
                
                            Select::make('assignment_user')
                            ->label('Assigned User')
                            ->relationship('assignment_user', 'name')
                            ->multiple()
                            ->columnSpan(12)
                            ->preload()
                            ])->from('sm')->columns(
            [
                'sm' => 3,
                'md' => 6,
                'lg' => 8,
                '2xl' => 12,
            ]

        )->columnSpanFull(),

        // Section::make('Assignment')->schema([
        //     Select::make('user_id')
        //         ->label('Assign User')
        //         ->relationship('assignment_user', 'name')
        //         ->multiple()
        //         ->preload()
        //         ->columnSpan(12)
        //         ->required(),
        //         ])->grow(false)->columnSpan(
        //                 [
        //                     'sm' => 3,
        //                     'md' => 6,
        //                     'lg' => 8,
        //                     '2xl' => 12,
        //                 ])


        // //for Task
        // Section::make('Tasks')
        // ->description('Fill out the form below to create a new task. Provide the task name and other necessary details to get started.')
        // ->schema([
        //     Repeater::make('repeater_data')
        //     ->columns(2)
        //     ->schema([
        //         Select::make('status')
        //             ->label('Status')
        //             ->options([
        //                 'Not Started' => 'Not Started',
        //                 'In Progress' => 'In Progress',
        //                 'Completed' => 'Completed',
        //             ])
        //             ->visibleOn('update')
        //             ->nullable()
        //             ->columnSpanFull()
        //             ->required(),
        //         TextInput::make('name')
        //             ->label('Task Name')
        //             ->columnSpanFull()
        //             ->required(),
        //         TextInput::make('description')
        //             ->label('Description')
        //             ->columnSpanFull()
        //             ->required(),
        //     ])
        //         ->columns(2)
        //     ])->visibleOn('create'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
                TextColumn::make('name')
                    ->label('Project Name')
                    ->icon('heroicon-o-user')
                    ->iconPosition('before')
                    ->limit(25)
                    ->searchable()
                    ->iconColor('primary')
                    ->sortable('asc'),
                TextColumn::make('description')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->label('Description'),
                TextColumn::make('status')
                ->label('Status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Not Started' => 'warning',
                    'In Progress' => 'info',
                    'Completed' => 'success',
                })
                ->searchable()
                ->sortable(),
                // TextColumn::make('created_at')
                //     ->searchable()
                //     ->limit(10)
                //     ->sortable()
                //     ->label('Created At'),
                // TextColumn::make('updated_at')
                //     ->searchable()
                //     ->limit(10)
                //     ->sortable()
                //     ->label('Updated At'),
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
            // TasksRelationManager::class,
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
