<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use App\Models\Project;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Section::make('Comment Information')
            ->schema([
                Select::make('user_id')
                ->label('User Commented')
                ->disabled()
                ->searchable()
                ->preload()
                ->relationship('user', 'name')
                ->columnSpan(6)
                ->required(),

            MorphToSelect::make('commentable')
                ->label('Where Commented')
                ->types([
                    MorphToSelect\Type::make(Project::class)->titleAttribute('name'),
                    MorphToSelect\Type::make(User::class)->titleAttribute('email'),
                    MorphToSelect\Type::make(Comment::class)->titleAttribute('id'),
                ])
                ->columnSpan(6)
                ->required()
                ->preload(),

                Forms\Components\Textarea::make('comment')
                ->label('Comment')
                ->columnSpanFull()
                ->rows(10)
                ->cols(20)
                ->columnSpan(12)
                ->minLength(2)
                ->autosize()
                ->maxLength(200)
                ->required(),
            ])->columns(12),
            
            //add your custom fields here
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('user.name')
                    ->label('User Commented'),
                    TextColumn::make('comment')
                    ->label('Comment')
                    ->limit(30),
                TextColumn::make('commentable_type')
                    ->label('Where Commented'),
                TextColumn::make('commentable_id')
                    ->label('Commented On')
                    ->limit(30),
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
