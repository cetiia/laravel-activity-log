<?php

namespace Cetiia\LaravelActivityLog\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class LaravelActivityLogMiddleware
{
    public function handle($request, Closure $next)
    {
        
        if ($request->ip() != '127.0.0.1') {
            $data = Http::get('http://ip-api.com/json/' . $request->ip())->json();
            $logData = [
                'user' => $request->user() ? $request->user()->name : 'anonymous',
                'ip' => $request->ip(),
                'country'=>$data['country'] ?? null,
                'state'=>$data['regionName'] ?? null,
                'city'=>$data['city'] ?? null,
                'path' => $request->path(),
                'method' => $request->method(),
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'browser' => $request->header('User-Agent'),
            ];
        
            // Save log as CSV
            $csvData = implode(',', $logData);
            Storage::append('logs/activity.csv', $csvData);
        }
        return $next($request);
    }
}
