<?php

namespace App\Filament\Resources\ComponentResource\Pages;

use App\Filament\Resources\ComponentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateComponent extends CreateRecord
{
    protected static string $resource = ComponentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['css'] = ComponentResource::compileCss($data);

        return $data;
    }
}
