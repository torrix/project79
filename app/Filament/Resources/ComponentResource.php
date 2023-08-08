<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComponentResource\Pages;
use App\Models\Component;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ComponentResource extends Resource
{
    protected static ?string $model = Component::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form->schema([
                Forms\Components\TextInput::make('name')->required()->label('Component Name'),
                Forms\Components\FileUpload::make('thumbnail')->required()->label('Thumbnail'),
                Forms\Components\Textarea::make('overrides')->label('Variable Overrides'),
                Forms\Components\Textarea::make('scss')->label('Custom SCSS'),
                Forms\Components\Textarea::make('html')->required()->label('HTML'),
                Forms\Components\Select::make('theme')->required()->label('Theme')->options([
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

    public static function getRelations(): array
    {
        return [//
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListComponents::route('/'),
            'create' => Pages\CreateComponent::route('/create'),
            'edit'   => Pages\EditComponent::route('/{record}/edit'),
        ];
    }
}