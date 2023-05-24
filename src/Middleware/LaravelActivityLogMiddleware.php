<?php

namespace Cetiia\LaravelActivityLog\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LaravelActivityLogMiddleware
{
    public function handle($request, Closure $next)
    {
        $logData = [
            'user' => $request->user() ? $request->user()->name : 'anonymous',
            'ip' => $request->ip(),
            'path' => $request->path(),
            'method' => $request->method(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'browser' => $request->header('User-Agent'),
        ];
    
        // Save log as CSV
        $csvData = implode(',', $logData);
        $csvRow = Str::endsWith($csvData, "\n") ? $csvData : $csvData . "\n";
        Storage::append('logs/activity.csv', $csvRow);
        return $next($request);
    }
}
