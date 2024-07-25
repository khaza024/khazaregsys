<?php

namespace App\Filament\Resources\AboutSchoolResource\Pages;

use App\Filament\Resources\AboutSchoolResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutSchool extends CreateRecord
{
    protected static string $resource = AboutSchoolResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
