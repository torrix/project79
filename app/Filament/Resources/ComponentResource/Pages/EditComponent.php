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
        $compiler = new Compiler();

        $implode = implode(PHP_EOL, [
            $data['overrides'],
            '@import "variables-theme.scss";',
            '@import "mixins-theme.scss";',
            '@import "uikit-theme.scss";',
            $data['scss'],
        ]);

        try {
            $compiler->setImportPaths('../node_modules/uikit/src/scss/');
            $css = $compiler->compile($implode);
        } catch (Exception $e) {
            $css = '/* ' . $e->getMessage() . '*/';
        }

        $data['css'] = $css;

        return $data;
    }
}
