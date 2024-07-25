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
use App\Filament\Resources\AboutSchoolResource\Pages;
use App\Filament\Resources\AboutSchoolResource\RelationManagers;

class AboutSchoolResource extends Resource
{
    protected static ?string $model = Information::class;

    protected static ?string $label = 'About School';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'School Management';

    protected static ?string $navigationLabel = 'About School';

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
            'index' => Pages\ListAboutSchools::route('/'),
            'edit' => Pages\EditAboutSchool::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('slug', 'tentang-sekolah');
    }
}
