<?php

namespace App\Filament\Resources\CpdResource\Pages;

use App\Filament\Resources\CpdResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCpd extends CreateRecord
{
    protected static string $resource = CpdResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
