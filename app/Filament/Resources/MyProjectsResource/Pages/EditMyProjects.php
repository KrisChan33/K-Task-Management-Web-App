<?php

namespace App\Filament\Resources\MyProjectsResource\Pages;

use App\Filament\Resources\MyProjectsResource;
use App\Models\Project;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditMyProjects extends EditRecord
{
    protected static string $resource = MyProjectsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->visible(fn (Project $record): bool => $record->user_id === Auth::id()),
        ];
    }
}
