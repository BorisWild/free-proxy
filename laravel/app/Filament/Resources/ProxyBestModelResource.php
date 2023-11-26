<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProxyBestModelResource\Pages;
use App\Models\ProxyBestModel;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ProxyBestModelResource extends Resource
{
    protected static ?string $model = ProxyBestModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    protected static ?string $navigationLabel = 'Checked';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('proxy_ip')
                    ->maxLength(255),
                TextInput::make('proxy_port')
                    ->maxLength(10),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('proxy_id')
                ->toggleable(isToggledHiddenByDefault: false)
                ,
            TextColumn::make('proxy_ip')
                ->toggleable(isToggledHiddenByDefault: false)
                ->searchable()
                ,
            TextColumn::make('proxy_port')
                ->toggleable(isToggledHiddenByDefault: false)
                ->searchable()
                ,
            TextColumn::make('proxy_success')
                ->toggleable(isToggledHiddenByDefault: false)
                ->sortable()
                ,
            TextColumn::make('proxy_used')
                ->toggleable(isToggledHiddenByDefault: false)
                ->sortable()
                ,
            TextColumn::make('proxy_captcha')
                ->toggleable(isToggledHiddenByDefault: false)
                ->sortable()
                ,
            TextColumn::make('proxy_last_suc')
                ->toggleable(isToggledHiddenByDefault: false)
                ->sortable()
                ,
            TextColumn::make('proxy_last_use')
                ->toggleable(isToggledHiddenByDefault: false)
                ->sortable()
                ,
            TextColumn::make('proxy_last_captcha')
                ->toggleable(isToggledHiddenByDefault: false)
                ->sortable()
                ,
            TextColumn::make('proxy_added')
                ->toggleable(isToggledHiddenByDefault: false)
                ->sortable()
                ,
            ])
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
            'index' => Pages\ListProxyBestModels::route('/'),
            'create' => Pages\CreateProxyBestModel::route('/create'),
            'edit' => Pages\EditProxyBestModel::route('/{record}/edit'),
        ];
    }
}
