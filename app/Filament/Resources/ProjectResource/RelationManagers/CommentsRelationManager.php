<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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
            ]);
    }


    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('comment')
            ->columns([
                TextColumn::make('user.name')
                ->label('User Commented'),
                TextColumn::make('comment')
                ->label('Comment')
                ->limit(30),
                TextColumn::make('created_at')
                ->since()
                ->dateTimeTooltip()
                ->label('Commented Date'),
                TextColumn::make('updated_at')
                ->since()
                ->dateTimeTooltip()
                ->label('Updated Date'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //

            ]);
    }
}
