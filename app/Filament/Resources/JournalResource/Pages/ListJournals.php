<?php

namespace App\Filament\Resources\JournalResource\Pages;

use App\Filament\Resources\JournalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJournals extends ListRecords
{
    protected static string $resource = JournalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('import-journals')
                ->label('Import Journals') // Label of the action button
                ->icon('heroicon-o-inbox-stack') // Icon for the action
                ->url('/admin/journals/import')
                ->color('info'), // Optional: set button colo
        ];
    }
}
