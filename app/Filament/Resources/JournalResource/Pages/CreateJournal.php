<?php

namespace App\Filament\Resources\JournalResource\Pages;

use App\Filament\Resources\JournalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJournal extends CreateRecord
{
    protected static string $resource = JournalResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['path'] = strtolower(str_replace(' ', '-', $data['title']));

        if($data['cover']){
            $data['cover_url'] = $data['cover'];
        }

        if (str_starts_with($data['cover_url'], 'journal_images/')) {
            $data['is_image_from_sync'] = false;
        }

        $data['is_manual_created'] = true;

        return parent::mutateFormDataBeforeCreate($data);
    }
}
