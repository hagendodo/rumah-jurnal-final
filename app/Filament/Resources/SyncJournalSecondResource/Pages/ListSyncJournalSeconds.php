<?php

namespace App\Filament\Resources\SyncJournalSecondResource\Pages;

use App\Filament\Resources\SyncJournalSecondResource;
use App\Helpers\SyncrhonizeHelper;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListSyncJournalSeconds extends ListRecords
{
    protected static string $resource = SyncJournalSecondResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('fetch-ojs')
                ->label('Synchronize Journal') // Label for the action
                ->icon('heroicon-o-cloud-arrow-down') // Icon for the action (you can use any available Heroicon)
                ->color('success') // Color for the button (success, primary, danger, etc.)
                ->action(function () {
                    SyncrhonizeHelper::fetchJournals();
                    // Action logic for Custom Action 1
                    Notification::make()
                        ->title('Synchronize Journal Status')
                        ->success()
                        ->body('Completed.')
                        ->send();
                }),
        ];
    }
}
