<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProxyBestModelResource\Pages;
use App\Filament\Resources\ProxyBestModelResource\RelationManagers;
use App\Models\ProxyBestModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\IconColumn;
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
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('proxy_id')
                ->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('proxy_ip')
                ->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('proxy_port')
                ->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('proxy_success')
                ->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('proxy_used')
                ->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('proxy_captcha')
                ->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('proxy_last_suc')
                ->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('proxy_last_use')
                ->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('proxy_last_captcha')
                ->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('proxy_added')
                ->toggleable(isToggledHiddenByDefault: false),
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
