<?php

use Cetiia\LaravelActivityLog\Models\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
Route::get('/activity-log', function () {
    if (Schema::hasTable('logs')) {
        $logs = Log::get()->sortByDesc('time')->sortByDesc('date');
    } else {
        // Table does not exist
        $logs = [];
    }
    return view('laravel-activity-log::activity-log', compact('logs'));
})->name('activity-log');