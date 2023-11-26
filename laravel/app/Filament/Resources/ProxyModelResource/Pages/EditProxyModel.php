<?php

namespace App\Filament\Resources\ProxyModelResource\Pages;

use App\Filament\Resources\ProxyModelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProxyModel extends EditRecord
{
    protected static string $resource = ProxyModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
