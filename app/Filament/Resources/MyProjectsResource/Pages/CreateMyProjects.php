<?php

namespace App\Filament\Resources\MyProjectsResource\Pages;

use App\Filament\Resources\MyProjectsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateMyProjects extends CreateRecord
{
    protected static string $resource = MyProjectsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();
        return $data;
    }
}
