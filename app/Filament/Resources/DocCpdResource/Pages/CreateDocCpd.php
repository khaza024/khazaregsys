<?php

namespace App\Filament\Resources\DocCpdResource\Pages;

use App\Filament\Resources\DocCpdResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDocCpd extends CreateRecord
{
    protected static string $resource = DocCpdResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
