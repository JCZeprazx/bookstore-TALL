<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Book;
use Filament\Tables;
use App\Models\Language;
use App\Models\Publisher;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BookResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BookResource\RelationManagers;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('book_name'),
                        Forms\Components\TextInput::make('isbn')
                            ->numeric(),
                        Forms\Components\TextInput::make('total_page')
                            ->numeric(),
                        Forms\Components\DatePicker::make('release_date'),
                        Select::make('category')
                            ->multiple()
                            ->relationship('category', 'category_name'),
                        Select::make('author')
                            ->multiple()
                            ->relationship('author', 'author_name'),
                        Select::make('language_id')
                            ->label('Language')
                            ->options(Language::all()->pluck('language', 'id'))
                            ->searchable(),
                        Select::make('publisher_id')
                            ->label('Publisher')
                            ->options(Publisher::all()->pluck('publisher_name', 'id'))
                            ->searchable(),
                        Forms\Components\TextInput::make('book_cost')
                            ->numeric(),
                        Forms\Components\Textarea::make('book_description')
                            ->columnSpan(2),
                        FileUpload::make('book_cover')
                            ->columnSpan(2)
                            ->preserveFilenames()
                            ->directory('book'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('book_cover'),
                Tables\Columns\TextColumn::make('book_name')->searchable(),
                Tables\Columns\TextColumn::make('isbn'),
                Tables\Columns\TextColumn::make('author.author_name'),
                Tables\Columns\TextColumn::make('publisher.publisher_name'),
                Tables\Columns\TextColumn::make('book_cost'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
