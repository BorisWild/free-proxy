<?php

namespace App\Filament\Resources\ProxyBestModelResource\Pages;

use App\Filament\Resources\ProxyBestModelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProxyBestModels extends ListRecords
{
    protected static string $resource = ProxyBestModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
