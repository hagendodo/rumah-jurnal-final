<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SyncJournalSecondResource\Pages;
use App\Models\Journal;
use App\Models\SyncJournalSecond;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;

class SyncJournalSecondResource extends Resource
{
    protected static ?string $model = SyncJournalSecond::class;
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $label = "Syncrhonize Journal";
    protected static ?string $breadcrumb = "Journals";


    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover') // Displays the image
                ->label('Cover')
                    ->width(150)
                    ->height("auto"),
                Tables\Columns\TextColumn::make('title')->sortable()->wrap()->searchable(),
                Tables\Columns\TextColumn::make('issn_print')->sortable(),
                Tables\Columns\TextColumn::make('issn_online')->sortable(),
                Tables\Columns\IconColumn::make('imported')
                    ->label('Imported')  // Optional: Set a custom label
                    ->getStateUsing(function ($record){
                        $data = SyncJournalSecond::with('existJournal')->where('id', $record->id)->first();

                        return (bool)$data->existJournal;})
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
//                Tables\Filters\SelectFilter::make('imported')
//                    ->options([
//                        'false' => 'Not Imported',
//                        'true' => 'Imported',
//                    ])
            ])
            ->actions([]) // Disable actions (no create, edit, delete)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('import')
                        ->label('Import') // Set the label for the action
                        ->icon('heroicon-o-paper-airplane') // Optionally add an icon
                        ->action(function ($records) {

                            $recorda = $records->pluck('id')->all();
                            $importedCount = 0;

                            foreach ($recorda as $recordId) {
                                // Find the SyncJournalSecond record by ID
                                $record = SyncJournalSecond::find($recordId);

                                // Ensure the record exists before trying to insert or update
                                if ($record) {
                                    // Prepare the data to insert or update into the Journal table
                                    $journalData = [
                                        'title' => $record->title,
                                        'issn_print' => $record->issn_print,
                                        'issn_online' => $record->issn_online,
                                        'about_desc' => $record->description,
                                        'scope_desc' => $record->aims_and_scope,
                                        'cover_url' => $record->cover,
                                        'journal_url' => $record->base_url."/index.php/".$record->path,
                                        'submit_url' => $record->submit_url,
                                        'guide_url' => $record->author_guide_url,
                                        'archive_url' => $record->archive_url,
                                        'publisher' => $record->publisher,
                                        'contact_name' => $record->contact_name,
                                        'contact_email' => $record->contact_email,
                                        'user_id' => auth()->id(),
                                        'slug' => $record->slug,
                                        'is_active' => $record->is_active ?? true,  // Default to true if not available
                                        'is_image_from_sync' => $record->is_image_from_sync ?? false,  // Default to false if not available
                                        'path' => $record->path,
                                        'is_manual_created' => $record->is_manual_created ?? false, // Default to false if not available
                                        'created_at' => $record->created_at,  // Or set it to now() if needed
                                        'updated_at' => now(),  // Set the current timestamp
                                    ];

                                    $journalData = array_map(function ($value) {
                                        return $value === null ? '' : $value;
                                    }, $journalData);

                                    // Insert or update the Journal table
                                    Journal::updateOrInsert(
                                        ['path' => $record->path],  // Unique key or condition for update
                                        $journalData  // Data to insert or update
                                    );

                                    $importedCount++;
                                }
                            }

                            Notification::make()
                                ->title('Journal Status')
                                ->success()
                                ->body($importedCount.' journal has been imported')
                                ->send();

                        })
                        ->requiresConfirmation() // Optional: ask for confirmation
                        ->color('primary'), // Optional: set button color
                ]),
            ]);
    }

    // Omit or disable form() method to prevent create/edit forms
    public static function form(\Filament\Forms\Form $form): \Filament\Forms\Form
    {
        return $form; // No form to return
    }

    // Omit or disable getActions() method to remove action buttons
    public static function getActions(): array
    {
        return []; // No actions (create, edit, etc.)
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSyncJournalSeconds::route('/'),
        ];
    }
}
