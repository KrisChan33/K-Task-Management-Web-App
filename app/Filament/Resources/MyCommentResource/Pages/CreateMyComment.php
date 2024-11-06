<?php

namespace App\Filament\Resources\MyCommentResource\Pages;

use App\Filament\Resources\MyCommentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMyComment extends CreateRecord
{
    protected static string $resource = MyCommentResource::class;
}
