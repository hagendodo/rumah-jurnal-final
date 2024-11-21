<?php

namespace App\Filament\Resources\JournalResource\Pages;

use App\Filament\Resources\JournalResource;
use App\Helpers\SyncrhonizeHelper;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ImportJournals extends ListRecords
{
    protected static string $resource = JournalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Custom Action 1
            Actions\Action::make('fetch-ojs2')
                ->label('Fetch OJS2') // Label for the action
                ->icon('heroicon-o-cloud-arrow-down') // Icon for the action (you can use any available Heroicon)
                ->color('success') // Color for the button (success, primary, danger, etc.)
                ->action(function () {
                    SyncrhonizeHelper::fetchJournals();
                    // Action logic for Custom Action 1
                    Notification::make()
                        ->title('Custom Action 1 Triggered')
                        ->success()
                        ->body('You triggered Custom Action 1.')
                        ->send();
                }),

            // Custom Action 2
            Actions\Action::make('fetch-ojs3')
                ->label('Fetch OJS3')
                ->icon('heroicon-o-cloud-arrow-down')
                ->color('info')
                ->action(function () {
                    // Action logic for Custom Action 2
                    Notification::make()
                        ->title('Custom Action 2 Triggered')
                        ->danger()
                        ->body('You triggered Custom Action 2.')
                        ->send();
                }),
        ];
    }
}
