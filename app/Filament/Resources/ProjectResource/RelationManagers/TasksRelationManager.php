<?php
namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TasksRelationManager extends RelationManager
{
    protected static string $relationship = 'tasks';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('repeater_data')
                    ->columns(2)
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Pending',
                                'in-progress' => 'In Progress',
                                'completed' => 'Completed',
                            ])
                            ->visibleOn('update')
                            ->default('pending')
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
                    ]),
            ]);
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