<?php

namespace App\Filament\Municipality\Widgets;


use App\Models\Flight;
use App\Models\Report;
use App\Models\Request;
use Filament\Facades\Filament;
use Filament\Widgets\ChartWidget;
use Illuminate\Database\Eloquent\Model;

class RequestsChart extends ChartWidget
{
    protected static ?string $heading = 'الطلبات كل شهر';

    protected static ?int $sort = 1;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $jan  =  Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '1')->count();
        $feb  =  Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '2')->count();
        $mar  =  Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '3')->count();
        $apr  =  Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '4')->count();
        $may  =  Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '5')->count();
        $june =  Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '6')->count();
        $july =  Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '7')->count();
        $aug  =  Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '8')->count();
        $seb  =  Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '9')->count();
        $oct  =  Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '10')->count();
        $nov  =  Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '11')->count();
        $dec  =  Request::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '12')->count();

        return [
            'datasets' => [
                [
                    'label' => 'الطلبات',
                    'data' => [$jan, $feb, $mar, $apr, $may, $june, $july, $aug, $seb, $oct, $nov, $dec],
                    'fill' => 'start',
                ],
            ],
            'labels' => ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'أغطسطس', 'سبتمبر', 'أكتوبر', 'نوفبمر', 'ديسمبر'],
        ];
    }
}
