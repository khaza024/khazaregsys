<?php

namespace App\Filament\Resources\DocCpdResource\Pages;

use App\Filament\Resources\DocCpdResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDocCpds extends ListRecords
{
    protected static string $resource = DocCpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
