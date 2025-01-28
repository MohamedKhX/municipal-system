<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ServicesController;
use App\Livewire\DetectLocation;
use Illuminate\Support\Facades\Route;


Route::prefix('m/{municipality:id}')->middleware('mun')->group(function () {

    Route::get('/', [HomeController::class, 'home'])
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

    Route::get('/reports/create', [ReportsController::class, 'create'])
        ->name('reports.create')
        ->middleware(['auth']);

    Route::get('/reports/{report:id}', [ReportsController::class, 'show'])
        ->name('reports.show');

    Route::get('/requests', function () {
        return view('requests');
    })->middleware(['auth'])
        ->name('requests');

    Route::view('/request-sent', 'request-sent')
        ->name('request-sent');
})
;

Route::get('/', DetectLocation::class);
Route::get('/notification', function () {
    return view('notification');
})->name('notification');

require __DIR__.'/auth.php';
