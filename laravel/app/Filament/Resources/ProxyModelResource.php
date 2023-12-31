<?php

namespace App\Filament\Resources;

use App\Models\Proxy;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\Position;

class ProxyModelResource extends Resource
{
    protected static ?string $model = Proxy::class;

    protected static ?string $navigationLabel = 'Queue';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('proxy_id')
                    ->maxLength(255),
                TextInput::make('proxy_ip')
                    ->maxLength(255),
                TextInput::make('proxy_checks')
                    ->maxLength(255),
                TextInput::make('proxy_del')
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
                    ->toggleable(isToggledHiddenByDefault: true)
                    ,
                TextColumn::make('proxy_ip')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ,
                TextColumn::make('proxy_port')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ,
                TextColumn::make('proxy_code_check')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()
                    ,
                TextColumn::make('proxy_checks')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()
                    ,
                TextColumn::make('proxy_del')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()
                    ,
                TextColumn::make('proxy_timer_check')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()
                    ,
                TextColumn::make('proxy_timercon_check')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()
                    ,
                TextColumn::make('proxy_last_check')
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
            'index' => \App\Filament\Resources\ProxyModelResource\Pages\ListProxyModels::route('/'),
            'create' => \App\Filament\Resources\ProxyModelResource\Pages\CreateProxyModel::route('/create'),
            'edit' => \App\Filament\Resources\ProxyModelResource\Pages\EditProxyModel::route('/{record}/edit'),
        ];
    }


}
