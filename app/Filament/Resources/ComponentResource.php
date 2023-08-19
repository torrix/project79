<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComponentResource\Pages;
use App\Filament\Resources\ComponentResource\RelationManagers\TagsRelationManager;
use App\Models\Component;
use Exception;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use ScssPhp\ScssPhp\Compiler;

class ComponentResource extends Resource
{
    protected static ?string $model = Component::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required()->label('Component Name'),
            FileUpload::make('thumbnail')->required()->label('Thumbnail'),
            Textarea::make('description')->label('Description'),
            Textarea::make('html')->required()->label('HTML'),
            Textarea::make('overrides')->label('Variable Overrides'),
            Textarea::make('scss')->label('Custom SCSS'),
            Select::make('user_id')
                ->relationship('user', 'name'),
            Select::make('theme')->required()->label('Theme')->options([
                'light' => 'Light',
                'dark'  => 'Dark',
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->sortable(),
            Tables\Columns\TextColumn::make('theme')->sortable(),
        ])->filters([//
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListComponents::route('/'),
            'create' => Pages\CreateComponent::route('/create'),
            'edit'   => Pages\EditComponent::route('/{record}/edit'),
        ];
    }

    public static function compileCss(array $data): string
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
        return $css;
    }

    public static function getRelations(): array
    {
        return [
            TagsRelationManager::class,
        ];
    }
}
