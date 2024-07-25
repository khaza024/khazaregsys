<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count()),
            Stat::make('Total Admins', User::where('role', User::ROLE_ADMIN)->count()),
            Stat::make('Total Committees', User::where('role', User::ROLE_COMMITTEE)->count()),
            Stat::make('Total Teachers', User::where('role', User::ROLE_TEACHER)->count()),
        ];
    }
}
