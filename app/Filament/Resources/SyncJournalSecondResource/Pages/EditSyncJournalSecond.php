<?php

namespace App\Filament\Resources\SyncJournalSecondResource\Pages;

use App\Filament\Resources\SyncJournalSecondResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSyncJournalSecond extends EditRecord
{
    protected static string $resource = SyncJournalSecondResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
