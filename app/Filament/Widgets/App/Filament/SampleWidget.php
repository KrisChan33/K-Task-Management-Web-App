<?php

namespace App\Filament\Widgets\App\Filament;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Illuminate\Console\View\Components\Task;

class SampleWidget extends BaseWidget
{
    use HasWidgetShield;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count()),
            // Stat::make('Total Task',  Task::count()),
            // Stat::make('Total Comments', 3000),
        ];
    }
}
