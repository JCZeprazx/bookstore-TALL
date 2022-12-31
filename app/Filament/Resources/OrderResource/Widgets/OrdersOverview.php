<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class OrdersOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Orders', Order::all()->count()),
            Card::make('Order Selesai', Order::where('status_id' ,'=', '1')->count()),
            Card::make('Order Belum Selesai', Order::where('status_id' ,'=', '2')->count()),
            Card::make('Order Batal', Order::where('status_id' ,'=', '3')->count()),
        ];
    }
}
