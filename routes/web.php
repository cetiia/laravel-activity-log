<?php

use Cetiia\LaravelActivityLog\Models\Log;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/activity-log', function () {

    $logs = Log::records();

    return view('laravel-activity-log::activity-log', compact('logs'));
})->name('activity-log');


Route::get('/activity-log/download', function () {
    $logs = Log::records();
    return Excel::download(function ($excel) use ($logs) {
        $excel->setTitle('Data Export')
              ->sheet('Sheet 1', function ($sheet) use ($logs) {
                  $sheet->fromArray($logs, null, 'A1', false, false);
              });
    }, 'exported-data.xls');
})->name('download-activity-log');