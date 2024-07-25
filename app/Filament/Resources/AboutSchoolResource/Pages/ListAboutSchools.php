<?php

namespace App\Filament\Resources\AboutSchoolResource\Pages;

use App\Filament\Resources\AboutSchoolResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutSchools extends ListRecords
{
    protected static string $resource = AboutSchoolResource::class;

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder|null
    {
        return parent::getTableQuery()->where('slug', 'tentang-sekolah');
    }

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
