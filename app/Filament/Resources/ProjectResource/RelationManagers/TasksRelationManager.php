<?php
namespace App\Filament\Resources\ProjectResource\RelationManagers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Faker\Provider\ar_EG\Text;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\select;

class TasksRelationManager extends RelationManager
{
    protected static string $relationship = 'tasks';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Task Form')
                    ->schema([
                        TextInput::make('name')
                            ->label('Task Name')
                            ->columnSpan(6)
                            ->disabled(fn (?Task $record): bool => $record && $record->project->user_id !== Auth::id())
                            ->required(),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'Pending' => 'Pending',
                                'In Progress' => 'In Progress',
                                'Completed' => 'Completed',
                            ])
                            ->columnSpan(6)
                            ->default('Pending')
                            ->required(),
                        Textarea::make('description')
                            ->label('Description')
                            ->rows(10)
                            ->disabled(fn (?Task $record): bool => $record && $record->project->user_id !== Auth::id())
                            ->cols(20)
                            ->columnSpan(12)
                            ->minLength(2)
                            ->maxLength(1024)
                            ->required(),
                    ])->columnSpanFull()->columnSpan(12),
                //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
        ->modifyQueryUsing(function ($query) {
            return $query->where('project_id', $this->ownerRecord->id ?? 'NULL');
        })
        ->columns([
            TextColumn::make('name')
            ->label('Task Name')
            ->limit(25)
            ->searchable()
            ->sortable(),
        TextColumn::make('description')
            ->label('Description')
            ->limit(30)
            ->searchable()
            ->sortable(),
            TextColumn::make('project.assignment_user.name')    
            ->label('Assigned To')
            ->limit(25)
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
        ]) ->description('Tasks belonging to this project. Remember you can\'t delete or edit a project task that is not yours. Only the status can be updated.')
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
                ->visible(fn (Task $record): bool => $record->project->user_id === Auth::id()),
            ])
            ->bulkActions([

            ]);
    }
}