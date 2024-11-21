<?php

namespace App\Filament\Resources\JournalResource\Pages;

use App\Filament\Resources\JournalResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class CardJournals extends ListRecords
{
    public $search = ''; // Livewire property for search input

    protected static string $resource = JournalResource::class;

    public function getView(): string
    {
        // Use a custom Blade view for cards
        return 'filament.resources.journal-resource.pages.card-layout';
    }

    protected function getViewData(): array
    {
        // Pass the records to the Blade view
        return [
            'records' => $this->getRecords(),
        ];
    }

    public function getRecords(): \Illuminate\Contracts\Pagination\Paginator
    {
        // Fetch records with search filtering
        return static::getResource()::getEloquentQuery()
            ->when($this->search, function (Builder $query) {
                $query->where('name', 'like', '%' . $this->search . '%'); // Replace 'name' with your searchable field
            })
            ->paginate(10); // Adjust the pagination size as needed
    }
}
