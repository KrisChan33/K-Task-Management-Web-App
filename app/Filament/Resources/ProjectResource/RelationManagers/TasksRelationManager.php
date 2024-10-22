<?php
namespace App\Filament\Resources\ProjectResource\RelationManagers;

use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class TasksRelationManager extends RelationManager
{
    protected static string $relationship = 'tasks';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Repeater::make('repeater_data')
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'Pending' => 'Pending',
                                'In Progress' => 'In Progress',
                                'Completed' => 'Completed',
                            ])
                            ->visibleOn('update')
                            ->default('Pending')
                            ->columnSpanFull()
                            ->required(),
                        TextInput::make('name')
                            ->label('Task Name')
                            ->columnSpanFull()
                            ->required(),
                        TextInput::make('description')
                            ->label('Description')
                            ->columnSpanFull()
                            ->required(),
                    ])
                ->defaultItems(0)
                ->reorderableWithButtons()
                ->collapsible()
                ->cloneable()
                ->orderColumn('sort')
                ->minItems(0)
                ->maxItems(30)
                ->columnSpanFull()
                ->label('Manage Tasks'),

                //
            ])->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project.name')
                    ->label('Task Name')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                TextColumn::make('project.description')
                    ->label('Description'),
                TextColumn::make('project.status')
                    ->label('Status'),
                TextColumn::make('project.status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'In Progress' => 'info',
                        'Completed' => 'success',
                        'Not Started' => 'danger', // Add this line to handle 'Not Started' case
                         default => 'danger', 
                    })
                    ->searchable()
                    ->sortable(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}