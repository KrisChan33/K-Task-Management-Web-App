<?php

namespace App\Filament\Resources\MyTaskResource\Pages;

use App\Filament\Resources\MyTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateMyTask extends CreateRecord
{
    protected static string $resource = MyTaskResource::class;
// protected function mutateFormDataBeforeCreate(array $data): array {
//     $data['project_id'] = Auth::id();
//     return $data;
// }
}