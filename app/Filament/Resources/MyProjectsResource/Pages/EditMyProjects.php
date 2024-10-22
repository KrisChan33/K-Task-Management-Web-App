<?php

namespace App\Filament\Resources\MyProjectsResource\Pages;

use App\Filament\Resources\MyProjectsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMyProjects extends EditRecord
{
    protected static string $resource = MyProjectsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
