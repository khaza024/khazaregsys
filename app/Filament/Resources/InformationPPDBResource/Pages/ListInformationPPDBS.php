<?php

namespace App\Filament\Resources\InformationPPDBResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InformationPPDBResource;

class ListInformationPPDBS extends ListRecords
{
    protected static string $resource = InformationPPDBResource::class;

    protected function getTableQuery(): Builder|null
    {
        return parent::getTableQuery()->whereIn('slug', ['berkas-ppdb', 'alur-ppdb']);
    }

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
