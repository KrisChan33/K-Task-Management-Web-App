<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\RelationManagers\TasksRelationManager;
use App\Filament\Resources\TaskResource\Pages;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Filament\Forms;
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
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Contracts\Role;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;
    protected static ?string $navigationGroup = 'Project Management (Admin)';

    protected static ?string $label = 'All Task';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Split::make([
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
                                ->relationship('project', 'name') // Corrected relationship method
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
                    // Section::make('Assignment')->schema([
                    //     Select::make('user_id')
                    //         ->label('Assign User')
                    //         ->relationship('project', 'user_id') // Corrected relationship method
                    //         ->default(Auth::id())
                    //         ->multiple()
                    //         ->visibleOn('edit')
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
                //another section

            ])->columnSpanFull(),
        ]);
        
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Task Name')
                    ->icon('heroicon-s-clipboard-document-list')
                    ->iconColor('primary')
                    ->iconPosition('before')
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
                    ->default('Pending')
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
        return [
            // TasksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        $user = User::find(Auth::id());
        return Auth::check() && Auth::user() == $user->hasRole('super_admin');
    }
}