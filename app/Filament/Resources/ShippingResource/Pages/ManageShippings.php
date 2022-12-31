<?php

namespace App\Filament\Resources\ShippingResource\Pages;

use App\Filament\Resources\ShippingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageShippings extends ManageRecords
{
    protected static string $resource = ShippingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
