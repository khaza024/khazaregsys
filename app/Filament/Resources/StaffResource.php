<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Staff;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StaffResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StaffResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Main Content')->schema([
                    TextInput::make('nip')
                        ->required(),
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Select::make('gender')
                        ->options([
                            'Laki-laki' => 'Laki-laki',
                            'Perempuan' => 'Perempuan',
                        ])
                        ->required(),
                    TextInput::make('place_of_birth')
                        ->required(),
                    DatePicker::make('date_of_birth')
                        ->required()
                        ->native(false)
                        ->displayFormat('d/m/Y'),
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    TextInput::make('telp')
                        ->label('Telephone')
                        ->tel()
                        ->required()
                        ->maxLength(15)
                        ->minLength(10)
                        ->rule('regex:/^[0-9\-]+$/'),
                ])->columns(2),
                Section::make('Region')->schema([
                    Group::make()->schema([
                        Select::make('province_id')
                            ->label('Province')
                            ->options(Province::all()->pluck('name', 'id'))
                            ->reactive()
                            ->afterStateUpdated(fn(callable $set) => $set('regency_id', null)),
                        Select::make('regency_id')
                            ->label('Regency')
                            ->options(function (callable $get) {
                                $provinceId = $get('province_id');
                                if ($provinceId) {
                                    return Regency::where('province_id', $provinceId)->pluck('name', 'id');
                                }
                                return [];
                            })
                            ->reactive()
                            ->afterStateUpdated(fn(callable $set) => $set('district_id', null)),
                        Select::make('district_id')
                            ->label('District')
                            ->options(function (callable $get) {
                                $regencyId = $get('regency_id');
                                if ($regencyId) {
                                    return District::where('regency_id', $regencyId)->pluck('name', 'id');
                                }
                                return [];
                            })
                            ->reactive()
                            ->afterStateUpdated(fn(callable $set) => $set('village_id', null)),
                        Select::make('village_id')
                            ->label('Village')
                            ->options(function (callable $get) {
                                $districtId = $get('district_id');
                                if ($districtId) {
                                    return Village::where('district_id', $districtId)->pluck('name', 'id');
                                }
                                return [];
                            })
                            ->reactive(),
                    ])->columns(2),
                    TextInput::make('address')
                        ->required()
                        ->maxLength(255),
                ]),
                Section::make('Meta')->schema([
                    Group::make()->schema([
                        TextInput::make('graduate')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('position')
                            ->required()
                            ->maxLength(255)
                    ])->columns(2),
                    FileUpload::make('image')->image()
                        ->directory('staff/thumbnails')
                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file, callable $get) {
                            $nm = $get('nip');
                            return (string) str($file->getClientOriginalName())
                                ->prepend($nm . '-');
                        }),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->size(50)->disk('public')
                    ->url(fn($record) => $record->image),
                TextColumn::make('nip')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('gender')->sortable()->searchable(),
                TextColumn::make('position')->sortable()->searchable(),
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}
