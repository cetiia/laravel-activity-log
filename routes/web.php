<?php

use Cetiia\LaravelActivityLog\Models\Log;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

Route::get('/activity-log', function () {

    $logs = Log::records();

    return view('laravel-activity-log::activity-log', compact('logs'));
})->name('activity-log');