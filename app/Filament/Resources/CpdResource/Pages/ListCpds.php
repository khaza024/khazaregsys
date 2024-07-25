<?php

namespace App\Filament\Resources\CpdResource\Pages;

use App\Filament\Resources\CpdResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCpds extends ListRecords
{
    protected static string $resource = CpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
