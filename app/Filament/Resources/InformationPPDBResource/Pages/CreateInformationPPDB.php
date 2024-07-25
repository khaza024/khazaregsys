<?php

namespace App\Filament\Resources\InformationPPDBResource\Pages;

use App\Filament\Resources\InformationPPDBResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInformationPPDB extends CreateRecord
{
    protected static string $resource = InformationPPDBResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
