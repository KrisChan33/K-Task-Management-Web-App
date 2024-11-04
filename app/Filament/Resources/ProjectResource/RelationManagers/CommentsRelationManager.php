<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('comment')
                ->label('Comment')
                ->columnSpanFull()
                ->rows(10)
                ->cols(20)
                ->columnSpan(12)
                ->minLength(2)
                ->autosize()
                ->maxLength(200)
                ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('comment')
            ->columns([
                ImageColumn::make('user.avatar_url')
                    ->label('')
                    ->circular()
                    ->size(20),
                TextColumn::make('user.name')
                    ->label('User Commented'),
                TextColumn::make('comment')
                    ->label('Comment')
                    ->limit(120),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->limit(30),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
