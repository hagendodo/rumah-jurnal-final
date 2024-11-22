<?php

namespace App\Filament\Resources;

use App\Enums\AccreditationEnum;
use App\Filament\Resources\JournalResource\Pages;
use App\Models\Journal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class JournalResource extends Resource
{
    protected static ?string $model = Journal::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('issn_print')
                    ->maxLength(255),
                Forms\Components\TextInput::make('issn_online')
                    ->maxLength(255),
                Forms\Components\Select::make('accreditation')
                    ->label('Accreditation')
                    ->options([
                        'NOT_ACCREDITED' => 'NOT ACCREDITED',
                        'SINTA_1' => 'SINTA 1',
                        'SINTA_2' => 'SINTA 2',
                        'SINTA_3' => 'SINTA 3',
                        'SINTA_4' => 'SINTA 4',
                        'SINTA_5' => 'SINTA 5',
                        'SINTA_6' => 'SINTA 6',
                    ])
                    ->default(0),
                Forms\Components\RichEditor::make('about_desc')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('scope_desc')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('journal_url')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('cover')
                    ->directory('journal_images')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                ->label('Cover'),
                Forms\Components\TextInput::make('submit_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('guide_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('archive_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('publisher')
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\Select::make('indices')
                    ->label('Index')
                    ->multiple()
                    ->label('Index')
                    ->relationship('indices', 'indices.name')
                    ->preload(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // For the cover image, assuming you have a column called 'cover_url'
                Tables\Columns\ImageColumn::make('cover_url') // Displays the image
                ->label('Cover')
                    ->width(150)
                    ->height("auto")
                    ->default('https://journal.uinsgd.ac.id/custom/img/uin2.png'),

                Tables\Columns\TextColumn::make('title')
                    ->words(6)
                    ->searchable(),

                Tables\Columns\TextColumn::make('accreditation')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => str_replace('_', ' ', $state)), // Replace underscores with spaces


                Tables\Columns\TextColumn::make('issn_print')
                    ->searchable(),

                Tables\Columns\TextColumn::make('issn_online')
                    ->searchable(),

                Tables\Columns\TextColumn::make('journal_url')
                    ->label('Journal URL')
                    ->url(fn ($record) => $record->journal_url) // Make it clickable
                    ->openUrlInNewTab() // Open in a new tab
                    ->formatStateUsing(fn () => 'Klik disini') // Display custom text
                    ->extraAttributes(['class' => 'text-blue-500 underline'])
                    ->searchable(),


                Tables\Columns\TextColumn::make('user.name')
                    ->label('Ditambahkan oleh')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ditambahkan pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJournals::route('/'),
            'create' => Pages\CreateJournal::route('/create'),
            'edit' => Pages\EditJournal::route('/{record}/edit'),
            'import' => \App\Filament\Resources\SyncJournalSecondResource\Pages\ListSyncJournalSeconds::route('/import'),
        ];
    }

    public function deleteRecord($id): void
    {
        $record = static::getResource()::getModel()::findOrFail($id);
        $record->delete();

        Notification::make()
            ->title('Record Deleted')
            ->success()
            ->body('The record has been successfully deleted.')
            ->send();
    }
}
