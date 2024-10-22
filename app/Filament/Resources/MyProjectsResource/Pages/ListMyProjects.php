<?php

namespace App\Filament\Resources\MyProjectsResource\Pages;

use App\Filament\Resources\MyProjectsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMyProjects extends ListRecords
{
    protected static string $resource = MyProjectsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
