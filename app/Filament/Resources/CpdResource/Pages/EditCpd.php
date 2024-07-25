<?php

namespace App\Filament\Resources\CpdResource\Pages;

use App\Filament\Resources\CpdResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCpd extends EditRecord
{
    protected static string $resource = CpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
