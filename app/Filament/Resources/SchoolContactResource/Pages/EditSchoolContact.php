<?php

namespace App\Filament\Resources\SchoolContactResource\Pages;

use App\Filament\Resources\SchoolContactResource;
use App\Models\Information;
use Filament\Resources\Pages\EditRecord;

class EditSchoolContact extends EditRecord
{
    protected static string $resource = SchoolContactResource::class;

    public function mount($record = null): void
    {
        $this->record = Information::where('slug', 'kontak-sekolah')->firstOrFail();
        // dd($this->record);
        $this->form->fill([
            'body' => $this->record->body,
        ]);
        // dd($this->form->getState());
    }

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\DeleteAction::make(),
    //     ];
    // }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['slug'] = 'kontak-sekolah';
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
