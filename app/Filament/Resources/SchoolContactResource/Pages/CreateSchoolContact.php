<?php

namespace App\Filament\Resources\SchoolContactResource\Pages;

use App\Filament\Resources\SchoolContactResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSchoolContact extends CreateRecord
{
    protected static string $resource = SchoolContactResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
