<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use Carbon\Carbon;
use Domains\Customer\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'User Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->placeholder('Customer name')
                    ->columnSpanFull(),
                Forms\Components\Select::make('gender')
                    ->required()
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ]),
                Forms\Components\DatePicker::make('date_of_birth')
                    ->required()
                    ->maxDate(fn (): string => date('Y-m-d')),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->unique()
                    ->placeholder('Email address'),
                Forms\Components\TextInput::make('contact_number')
                    ->required()
                    ->unique()
                    ->minLength(11)
                    ->maxLength(11)
                    ->placeholder('09XXXXXXXXX'),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->placeholder('Complete address')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'inactive' => 'warning',
                        'active' => 'success',
                    }),
                Tables\Columns\TextColumn::make('updated_at')
                    ->sortable()
                    ->label('Updated')
                    ->formatStateUsing(fn (?Customer $record): string => Carbon::parse($record->updated_at)->diffForHumans()),

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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
