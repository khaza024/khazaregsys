<?php

namespace App\Filament\Resources;

use App\Models\Cpd;
use Filament\Forms;
use Filament\Tables;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Filament\Forms\Form;
use App\Models\SchoolYear;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CpdResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CpdResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;

class CpdResource extends Resource
{
    protected static ?string $model = Cpd::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Main Content')->schema([
                    Group::make()->schema([
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
                    ])->columns(2),
                    Radio::make('abk')
                        ->label('ABK')
                        ->default(false),
                    Group::make()->schema([
                        TextInput::make('tk')
                            ->required(),
                        TextInput::make('note_abk')->label('Note ABK')
                            ->default('Tidak ABK'),
                    ])->columns(2),
                    Select::make('year')
                        ->options(SchoolYear::where('active', true)->pluck('name', 'name'))
                        ->required(),
                ]),
                Section::make('Region')->schema([
                    Group::make()->schema([
                        Select::make('province_id')
                            ->label('Province')
                            ->options(Province::all()->pluck('name', 'id'))
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('regency_id', null)),
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
                            ->afterStateUpdated(fn (callable $set) => $set('district_id', null)),
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
                            ->afterStateUpdated(fn (callable $set) => $set('village_id', null)),
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
                    Textarea::make('address')
                        ->required()
                        ->maxLength(255),
                ]),
                Section::make('Meta')->schema([
                    TextInput::make('father')
                        ->label('Name Father')
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('mother')
                        ->label('Name Mother')
                        ->maxLength(255)
                        ->required(),
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('gender'),
                TextColumn::make('tk')->label('Asal TK'),
                TextColumn::make('telp')->label('No. Hp Orang Tua'),
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
            'index' => Pages\ListCpds::route('/'),
            'create' => Pages\CreateCpd::route('/create'),
            'edit' => Pages\EditCpd::route('/{record}/edit'),
        ];
    }
}
