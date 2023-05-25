<?php

use Cetiia\LaravelActivityLog\Models\Log;
use Illuminate\Support\Facades\Route;

Route::get('/activity-log', function () {
    $logs = Log::records();
    return view('laravel-activity-log::activity-log', compact('logs'));
})->name('activity-log');