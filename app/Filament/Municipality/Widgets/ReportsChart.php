<?php

namespace App\Filament\Municipality\Widgets;


use App\Models\Flight;
use App\Models\Report;
use Filament\Facades\Filament;
use Filament\Widgets\ChartWidget;
use Illuminate\Database\Eloquent\Model;

class ReportsChart extends ChartWidget
{
    protected static ?string $heading = 'البلاغات كل شهر';

    protected static ?int $sort = 1;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $jan  =  Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '1')->count();
        $feb  =  Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '2')->count();
        $mar  =  Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '3')->count();
        $apr  =  Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '4')->count();
        $may  =  Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '5')->count();
        $june =  Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '6')->count();
        $july =  Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '7')->count();
        $aug  =  Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '8')->count();
        $seb  =  Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '9')->count();
        $oct  =  Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '10')->count();
        $nov  =  Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '11')->count();
        $dec  =  Report::where('municipality_id', '=', Filament::auth()->user()->municipality_id)
                        ->whereMonth('created_at', '=', '12')->count();

        return [
            'datasets' => [
                [
                    'label' => 'البلاغات',
                    'data' => [$jan, $feb, $mar, $apr, $may, $june, $july, $aug, $seb, $oct, $nov, $dec],
                    'fill' => 'start',
                ],
            ],
            'labels' => ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'أغطسطس', 'سبتمبر', 'أكتوبر', 'نوفبمر', 'ديسمبر'],
        ];
    }
}
