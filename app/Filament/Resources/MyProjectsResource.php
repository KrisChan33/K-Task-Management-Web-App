<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MyprojectResource\RelationManagers\CommentsRelationManager;
use App\Filament\Resources\MyProjectsResource\Pages;
use App\Filament\Resources\MyProjectsResource\RelationManagers;
use App\Filament\Resources\ProjectResource\RelationManagers\CommentsRelationManager as RelationManagersCommentsRelationManager;
use App\Filament\Resources\ProjectResource\RelationManagers\TasksRelationManager;
use App\Models\Comment;
use App\Models\MyProjects;
use App\Models\Project;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MyProjectsResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string $icon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'My Projects';
    protected static ?string $navigationGroup = 'Project Management';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Split::make([
            Section::make('Project Form')->description('Fill out the form below to create a new project. Provide the project name and other necessary details to get started.')
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
                                // Placeholder::make('start_date')
                                // ->content(fn (?Project $record): string => optional($record)->start_date?->toFormattedDateString() ?? 'N/A'),
                                
                                // Placeholder::make('end_date')
                                // ->content(fn (?Project $record): string => optional($record)->end_date?->toFormattedDateString() ?? 'N/A'),
                        
                                Placeholder::make('created_at')
                                ->content(fn (?Project $record): string => optional($record)->created_at?->toFormattedDateString() ?? 'N/A'),

                                Placeholder::make('updated_at')
                                ->content(fn (?Project $record): string => optional($record)->updated_at?->toFormattedDateString() ?? 'N/A'),

                                Placeholder::make('created_by')
                                ->content(fn (?Project $record): string => optional($record)->user->name ?? 'N/A'),

                                ])->grow(false)->columnSpan(12),
        ])->from('sm')->columns(
            [
                'sm' => 3,
                'md' => 6,
                'lg' => 8,
                '2xl' => 12,
            ]

        )->columnSpanFull(),


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
        //         ->reorderableWithButtons()
        //         ->collapsible()
        //         ->defaultItems(0)
        //         ->cloneable()
        //         ->grid(2)
        //         ->orderColumn('sort')
        //         ->minItems(0)
        //         ->maxItems(30)
        //         ->label('Manage Tasks')
        //     ])->visibleOn('create'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
        ->query(fn () => Project::query()->where('user_id', Auth::id())
        ->orWhereHas('assignment_user', function ($query) {
            $query->where('user_id', Auth::id());
        }))
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
                TextColumn::make('user.name')
                ->label('Created By')
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
                Tables\Actions\DeleteAction::make(),
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
            TasksRelationManager::class,
            RelationManagersCommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMyProjects::route('/'),
            'create' => Pages\CreateMyProjects::route('/create'),
            'edit' => Pages\EditMyProjects::route('/{record}/edit'),
        ];
    }


}