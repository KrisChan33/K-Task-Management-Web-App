<?php

namespace App\Filament\Widgets\App\Filament;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Illuminate\Support\Facades\Auth;

class SampleWidget extends BaseWidget
{
    use HasWidgetShield;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count()),
            Stat::make('Total Projects',  Project::count()),
            Stat::make('Total Task',  Task::count()),

        ];


    }

    public static function canViewAny(): bool
    {
        $user = User::find(Auth::id());
        return Auth::check() && Auth::user() == $user->hasRole('super_admin');
    }
    
}
