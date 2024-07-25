<?php

namespace App\Filament\Resources\DocCpdResource\Pages;

use App\Filament\Resources\DocCpdResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDocCpd extends EditRecord
{
    protected static string $resource = DocCpdResource::class;

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
