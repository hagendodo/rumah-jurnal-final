<?php

namespace App\Filament\Resources\JournalResource\Pages;

use App\Filament\Resources\JournalResource;
use App\Models\Journal;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJournal extends EditRecord
{
    protected static string $resource = JournalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $journal = Journal::where('title', $data['title'])->first();

        if($data['cover']){
            $data['cover_url'] = $data['cover'];
        }else{
            $data['cover_url'] = $journal->cover_url;
        }

        $data['user_id'] = auth()->id();

        if (str_starts_with($data['cover_url'], 'journal_images/')) {
            $data['is_image_from_sync'] = false;
        }

        $data['is_manual_created'] = true;

        return parent::mutateFormDataBeforeSave($data);
    }
}
