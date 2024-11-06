<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MyCommentResource\Pages;
use App\Filament\Resources\MyCommentResource\RelationManagers;
use App\Models\Comment;
use App\Models\MyComment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MyCommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    // protected static ?string $navigationParentItem = 'Projects';
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationGroup = 'Project Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->query(fn(Comment $query) => $query->where('user_id', auth()->id()))
            ->columns([
            ImageColumn::make('user.avatar_url')
                ->label('')
                ->circular()
                ->size(20),
            TextColumn::make('comment')
                ->label('The Comment')
                ->limit(120),
            
            TextColumn::make('commentable.name')
                ->label('Commented to'),

            TextColumn::make('simplified_commentable_type')
                ->label('Commented at'),

            TextColumn::make('created_at')
                ->label('')
                ->since()
                ->limit(30),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListMyComments::route('/'),
            // 'create' => Pages\CreateMyComment::route('/create'),
            // 'edit' => Pages\EditMyComment::route('/{record}/edit'),
        ];
    }
}
