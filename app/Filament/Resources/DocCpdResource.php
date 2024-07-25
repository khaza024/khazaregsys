<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\DocCpd;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DocCpdResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DocCpdResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class DocCpdResource extends Resource
{
    protected static ?string $model = DocCpd::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('cpd_id')
                    ->relationship('cpd', 'name')
                    ->searchable()
                    ->required(),
                FileUpload::make('card_identity_father')
                    ->label('Father Identity Card')
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->directory(function (callable $get) {
                        $cpdId = $get('cpd_id');
                        return 'cpds/files/student-' . $cpdId;
                    })
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file, callable $get) {
                        $cpdId = $get('cpd_id');
                        return (string) str($file->getClientOriginalName())
                            ->prepend($cpdId . '-');
                    })
                    ->required(),
                FileUpload::make('card_identity_mother')
                    ->label('Mother Identity Card')
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->directory(function (callable $get) {
                        $cpdId = $get('cpd_id');
                        return 'cpds/files/student-' . $cpdId;
                    })
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file, callable $get) {
                        $cpdId = $get('cpd_id');
                        return (string) str($file->getClientOriginalName())
                            ->prepend($cpdId . '-');
                    })
                    ->required(),
                FileUpload::make('card_family')
                    ->label('Family Card')
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->directory(function (callable $get) {
                        $cpdId = $get('cpd_id');
                        return 'cpds/files/student-' . $cpdId;
                    })
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file, callable $get) {
                        $cpdId = $get('cpd_id');
                        return (string) str($file->getClientOriginalName())
                            ->prepend($cpdId . '-');
                    })
                    ->required(),
                FileUpload::make('card_born')
                    ->label('Birth Certificate')
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->directory(function (callable $get) {
                        $cpdId = $get('cpd_id');
                        return 'cpds/files/student-' . $cpdId;
                    })
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file, callable $get) {
                        $cpdId = $get('cpd_id');
                        return (string) str($file->getClientOriginalName())
                            ->prepend($cpdId . '-');
                    })
                    ->required(),
            ])->columns('full');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('cpd.name')->sortable()->searchable(),
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
            'index' => Pages\ListDocCpds::route('/'),
            'create' => Pages\CreateDocCpd::route('/create'),
            'edit' => Pages\EditDocCpd::route('/{record}/edit'),
        ];
    }
}
