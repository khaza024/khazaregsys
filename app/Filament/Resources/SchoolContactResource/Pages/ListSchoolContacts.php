<?php

namespace App\Filament\Resources\SchoolContactResource\Pages;

use App\Filament\Resources\SchoolContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSchoolContacts extends ListRecords
{
    protected static string $resource = SchoolContactResource::class;

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder|null
    {
        return parent::getTableQuery()->where('slug', 'kontak-sekolah');
    }

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
