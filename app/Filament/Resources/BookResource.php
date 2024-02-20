<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use Carbon\Carbon;
use Domains\Author\Projections\Author;
use Domains\Book\Projections\Book;
use Domains\Genre\Projections\Genre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

/**
 * BookResource
 */
class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Library Management';

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
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),
                Forms\Components\Select::make('authors')
                    ->multiple()
                    ->options(Author::all()->pluck('name', 'uuid'))
                    ->formatStateUsing(fn (?Book $record) => $record ? $record->authors->pluck('uuid')->toArray() : [])
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
                Forms\Components\Select::make('genres')
                    ->multiple()
                    ->options(Genre::all()->pluck('name', 'uuid'))
                    ->formatStateUsing(fn (?Book $record) => $record ? $record->genres->pluck('uuid')->toArray() : [])
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'not-available' => 'Not Available',
                        'borrowed' => 'Borrowed',
                    ])
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Set as Featured?')
                    ->default(false)
                    ->formatStateUsing(fn (?Book $record) => $record && $record->is_featured === 1 ? true : false),
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
                    ->description(fn (Book $record): string => Str::limit($record->description, 50))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'not-available' => 'danger',
                        'borrowed' => 'warning'
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->formatStateUsing(fn (Book $record): string => Carbon::parse($record->created_at)->diffForHumans())
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated')
                    ->formatStateUsing(fn (Book $record): string => Carbon::parse($record->created_at)->diffForHumans())
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
            //
        ];
    }

    /**
     * getPages
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
