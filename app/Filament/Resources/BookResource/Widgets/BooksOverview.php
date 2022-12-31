<?php

namespace App\Filament\Resources\BookResource\Widgets;

use App\Models\Book;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class BooksOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Buku', Book::all()->count())
        ];
    }
}
