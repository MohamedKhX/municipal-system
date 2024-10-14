<?php

namespace App\Filament\Municipality\Widgets;

use App\Models\News;
use App\Models\Report;
use App\Models\Request;
use App\Models\RequestType;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class StatsOverviewWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        $totalNews         = News::where('municipality_id', '=', Filament::auth()->user()->municipality_id)->count();
        $totalReports      = Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)->count();
        $totalRequests     = Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)->count();
        $totalRequestTypes = RequestType::where('municipality_id', '=', Filament::auth()->user()->municipality_id)->count();
        $totalServices     = Service::where('municipality_id', '=', Filament::auth()->user()->municipality_id)->count();
        $totalUsers        = User::count();

        return [
            Stat::make('عدد الأخبار الكلي', $totalNews)
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            Stat::make('عدد البلاغات الكلي', $totalReports)
                ->chart([5, 8, 13, 5, 20, 6, 18])
                ->color('danger'),

            Stat::make('عدد الطلبات الكلي', $totalRequests)
                ->chart([4, 6, 11, 2, 10, 3, 12])
                ->color('primary'),

            Stat::make('عدد أنواع الطلبات الكلي', $totalRequestTypes)
                ->chart([3, 5, 8, 4, 12, 5, 9])
                ->color('info'),

            Stat::make('عدد الخدمات الكلي', $totalServices)
                ->chart([6, 3, 7, 9, 14, 2, 15])
                ->color('warning'),

            Stat::make('عدد المستخدمين الكلي', $totalUsers)
                ->chart([9, 11, 8, 12, 16, 9, 13])
                ->color('secondary'),
        ];
    }
}
