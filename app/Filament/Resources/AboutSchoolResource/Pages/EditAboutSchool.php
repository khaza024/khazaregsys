<?php

namespace App\Filament\Resources\AboutSchoolResource\Pages;

use Filament\Actions;
use App\Models\Information;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\AboutSchoolResource;

class EditAboutSchool extends EditRecord
{
    protected static string $resource = AboutSchoolResource::class;

    public function mount($record = null): void
    {
        $this->record = Information::where('slug', 'tentang-sekolah')->firstOrFail();
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
        $data['slug'] = 'tentang-sekolah';
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
