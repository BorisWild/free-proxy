<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers\ProductAtachmentsRelationManager;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $navigationLabel = 'Products';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ,
                Textarea::make('description')
                    ->required()
                    ,
                FileUpload::make('thumbnail')
                    ->image()
                    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.id')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('thumbnail')
                    ->toggleable(isToggledHiddenByDefault: true)
                ,
                Tables\Columns\TextColumn::make('is_public')
                    ->toggleable(isToggledHiddenByDefault: true)
                ,
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
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
            ])
            ->filters([
               // Tables\Filters\TrashedFilter::make(),
                Filter::make('my products')
                    ->query(fn (Builder $query): Builder => $query->where('user_id', auth()->user()->id))
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ProductAtachmentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

//    public static function getEloquentQuery(): Builder
//    {
//        return parent::getEloquentQuery()
//            ->withoutGlobalScopes([
//                SoftDeletingScope::class,
//            ]);
//    }
}
