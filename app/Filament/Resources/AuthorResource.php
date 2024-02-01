<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorResource\Pages;
use Carbon\Carbon;
use Domains\Author\Models\Author;
use Domains\Book\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

/**
 * AuthorResource
 */
class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    /**
     * form
     *
     * @param  mixed  $form
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->placeholder('Author name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->placeholder('john.doe@example.com')
                    ->email(),
                Forms\Components\Textarea::make('description')
                    ->rows(5)
                    ->placeholder('A brief description about the author.')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('contact_number')
                    ->prefix('+63')
                    ->placeholder('9123456789')
                    ->maxLength(10),
                Forms\Components\DatePicker::make('date_of_birth')
                    ->required()
                    ->maxDate(fn (): string => date('Y-m-d')),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->placeholder('Complete address')
                    ->columnSpanFull(),
                Forms\Components\Select::make('books')
                    ->multiple()
                    ->options(Book::all()->pluck('name', 'id'))
                    ->formatStateUsing(fn (?Author $record) => $record ? $record->books->pluck('id')->toArray() : [])
                    ->preload()
                    ->searchable()
                    ->columnSpanFull(),
            ]);
    }

    /**
     * table
     *
     * @param  mixed  $table
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->description(fn (Author $record): string => '+63' . $record->contact_number . ' | ' . Str::limit($record->address, 100))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated')
                    ->formatStateUsing(fn (Author $record): string => Carbon::parse($record->updated_at)->diffForHumans())
                    ->sortable(),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                //
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

    /**
     * getRelations
     */
    public static function getRelations(): array
    {
        return [
            // BooksRelationManager::class
        ];
    }

    /**
     * getPages
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }
}
