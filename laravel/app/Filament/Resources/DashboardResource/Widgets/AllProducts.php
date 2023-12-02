<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use App\Models\Product;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class AllProducts extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Product::query()
            )
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]) ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }
}
