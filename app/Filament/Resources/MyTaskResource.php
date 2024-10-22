<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MyTaskResource\Pages;
use App\Filament\Resources\MyTaskResource\RelationManagers;
use App\Models\MyTask;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
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
    protected static ?string $label = 'My Tasks';

    public static function form(Form $form): Form
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
                    ->columnSpanFull()
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->uq
            ->columns([
                TextColumn::make('name')
                    ->label('Task Name')
                    ->limit(25)
                    ->searchable()
                    ->sortable()
                    ->wrap(),
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
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\CreateAction::make(),

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