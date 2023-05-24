<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
Route::get('/activity-log', function () {
    $logData = Storage::get('logs/activity.csv');
    $logRows = explode("\n", $logData);
    $logs = [];

    foreach ($logRows as $row) {
        $logFields = explode(',', $row);
        $logs[] = [
            'user' => $logFields[0],
            'ip' => $logFields[1],
            'path' => $logFields[2],
            'method' => $logFields[3],
            'date' => $logFields[4],
            'time' => $logFields[5],
            'browser' => $logFields[6],
        ];
    }

    return view('laravel-activity-log::activity-log', compact('logs'));
})->name('activity-log');
