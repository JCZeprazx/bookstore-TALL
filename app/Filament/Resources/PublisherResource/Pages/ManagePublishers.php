<?php

namespace App\Filament\Resources\PublisherResource\Pages;

use App\Filament\Resources\PublisherResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePublishers extends ManageRecords
{
    protected static string $resource = PublisherResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
