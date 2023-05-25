<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/activity-log', function () {

    $logData = Storage::get('logs/activity.csv');
    $logRows = explode("\n", $logData);
    $logs = [];

    foreach ($logRows as $row) {
        $logFields = explode(',', $row);
        if (count($logFields) > 1) {
            $logs[] = [
                'user' => $logFields[0],
                'ip' => $logFields[1],
                'country' => $logFields[2],
                'state' => $logFields[3],
                'city' => $logFields[4],
                'path' => $logFields[5],
                'method' => $logFields[6],
                'date' => $logFields[7],
                'time' => $logFields[8],
                'browser' => $logFields[9],
            ];
        }
    }

    return view('laravel-activity-log::activity-log', compact('logs'));
})->name('activity-log');

Route::get('/activity-log/download', function () {
    $filePath = 'logs/activity.csv';

    if (!Storage::exists($filePath)) {
        abort(404);
    }

    return Storage::download($filePath, 'activity-log.csv');
})->name('download-activity-log');
