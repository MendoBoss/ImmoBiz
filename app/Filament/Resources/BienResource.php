<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Bien;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BienResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BienResource\RelationManagers;

class BienResource extends Resource
{
    protected static ?string $model = Bien::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title'),
                Select::make('category')
                ->relationship(name: 'category', titleAttribute: 'title')
                ->required(),
                TextInput::make('user.name'),
                TextInput::make('state'),
                TextInput::make('price'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('category.title'),
                TextColumn::make('user.name'),
                TextColumn::make('state'),
                TextColumn::make('price'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBiens::route('/'),
            'create' => Pages\CreateBien::route('/create'),
            'edit' => Pages\EditBien::route('/{record}/edit'),
        ];
    }
}
