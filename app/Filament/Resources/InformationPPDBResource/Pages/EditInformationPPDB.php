<?php

namespace App\Filament\Resources\InformationPPDBResource\Pages;

use Filament\Actions;
use App\Models\Information;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\InformationPPDBResource;

class EditInformationPPDB extends EditRecord
{
    protected static string $resource = InformationPPDBResource::class;

    public function mount($record): void
    {
        parent::mount($record);

        // Ensure the record has a valid slug
        if (!in_array($this->record->slug, ['berkas-ppdb', 'alur-ppdb'])) {
            abort(404);
        }
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return [
            'body' => $data['body'],
            // Add other fields as necessary
        ];
    }

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\DeleteAction::make(),
    //     ];
    // }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
