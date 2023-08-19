<?php

namespace App\Filament\Resources\ComponentResource\Pages;

use App\Filament\Resources\ComponentResource;
use Exception;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use ScssPhp\ScssPhp\Compiler;

class EditComponent extends EditRecord
{
    protected static string $resource = ComponentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['css'] = ComponentResource::compileCss($data);

        return $data;
    }
}
