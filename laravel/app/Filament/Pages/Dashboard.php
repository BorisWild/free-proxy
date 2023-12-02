<?php

namespace App\Filament\Pages;

use App\Filament\Resources\DashboardResource\Widgets\AllProducts;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends \Filament\Pages\Dashboard
{
    public function getColumns(): int | string | array
    {
        return 2;
    }

    use HasFiltersForm;

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        DatePicker::make('startDate'),
                        DatePicker::make('endDate'),
                        // ...
                    ])
                    ->columns(3),
            ]);
    }

    public function getHeaderWidgets(): array
    {
        return [AllProducts::class];
    }
}
