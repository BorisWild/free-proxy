<?php

namespace App\Filament\Resources\ProxyModelResource\Pages;

use App\Filament\Resources\ProxyModelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProxyModels extends ListRecords
{
    protected static string $resource = ProxyModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
