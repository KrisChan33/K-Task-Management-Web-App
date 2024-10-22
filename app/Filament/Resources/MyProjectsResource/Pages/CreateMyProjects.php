<?php

namespace App\Filament\Resources\MyProjectsResource\Pages;

use App\Filament\Resources\MyProjectsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMyProjects extends CreateRecord
{
    protected static string $resource = MyProjectsResource::class;
}
