<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MyTaskResource\Pages;
use App\Filament\Resources\MyTaskResource\RelationManagers;
use App\Models\MyTask;
use App\Models\Project;
use App\Models\Task;
use Doctrine\DBAL\Query;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MyTaskResource extends Resource
{
    protected static ?string $model = Task::class;
    protected static ?string $navigationParentItem = 'My Projects';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Project Management';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Group::make([
                Section::make('Task Form')
                    ->label('Task Form')
                    ->description('Fill out the form below to create a new task. Provide the task name and other necessary details to get started.')
                    ->schema([
                        Grid::make(12)->schema([
                            TextInput::make('name')
                                ->label('Task Name')
                                ->columnSpan(6)
                                ->required(),
                            Select::make('project_id')
                                ->label('Project Name')
                                ->options(Project::where('user_id', Auth::id())->pluck('name', 'id'))
                                ->columnSpan(4)
                                ->required(),
                            Select::make('status')
                                ->label('Status')
                                ->options([
                                    'Pending' => 'Pending',
                                    'In Progress' => 'In Progress',
                                    'Completed' => 'Completed',
                                ])
                                ->default('Pending')
                                ->columnSpan(2)
                                ->required(),
                            Textarea::make('description')
                                ->label('Description')
                                ->autosize()
                                ->rows(4)
                                ->columnSpan(12)
                                ->required(),
                        ]),
                    ]),
            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(fn() =>Task::whereHas('project', function ($query) {
                $query->where('user_id', Auth::id());
            }))
            ->columns([
                TextColumn::make('name')
                    ->label('Task Name')
                    ->limit(25)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('project.name')
                    ->label('Project Name')
                    ->limit(25)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(30)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'In Progress' => 'info',
                        'Completed' => 'success',
                    })
                    ->searchable()
                    ->sortable(),
            ])
            
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMyTasks::route('/'),
            'create' => Pages\CreateMyTask::route('/create'),
            'edit' => Pages\EditMyTask::route('/{record}/edit'),
        ];
    }
}