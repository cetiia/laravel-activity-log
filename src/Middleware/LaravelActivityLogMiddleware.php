<?php

namespace Cetiia\LaravelActivityLog\Middleware;

use Cetiia\LaravelActivityLog\Models\Log;
use Closure;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

class LaravelActivityLogMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Schema::hasTable('logs')) {
            if ($request->ip() != '127.0.0.1') {
                $data = Http::get('http://ip-api.com/json/' . $request->ip())->json();
            }else{
                $data = [];
            }
    
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
            Log::create($logData);
        } else {
            dump('Need to migrate logs table');
        }
        

        return $next($request);
    }
}
