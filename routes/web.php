<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/news/{news:id}', [NewsController::class, 'show'])
    ->name('news.show');

Route::get('/services', [ServicesController::class, 'index'])
    ->name('services.index');

Route::get('/services/{service:id}', [ServicesController::class, 'show'])
    ->name('services.show');

Route::get('/reports', [ReportsController::class, 'index'])
    ->name('reports.index');

Route::get('/reports/{report:id}', [ReportsController::class, 'show'])
    ->name('reports.show');


Route::get('/test', function () {
    return view('test');
});

require __DIR__.'/auth.php';
