<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Information;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SchoolContactResource\Pages;
use App\Filament\Resources\SchoolContactResource\RelationManagers;

class SchoolContactResource extends Resource
{
    protected static ?string $model = Information::class;

    protected static ?string $label = 'School Contact';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'School Management';

    protected static ?string $navigationLabel = 'School Contact';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('body')
                    ->required()
                    ->fileAttachmentsDirectory('information/images')->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('body')
                    ->limit(100)
                    ->html(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListSchoolContacts::route('/'),
            'edit' => Pages\EditSchoolContact::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('slug', 'kontak-sekolah');
    }
}
