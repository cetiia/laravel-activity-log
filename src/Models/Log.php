<?php

namespace Cetiia\LaravelActivityLog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Log extends Model
{
    protected $fillable = [
        'user',
        'ip',
        'country',
        'state',
        'city',
        'path',
        'method',
        'date',
        'time',
        'browser',
    ];

    public static function records()
    {
        $logData = Storage::get('logs/activity.csv');
        $logRows = explode("\n", $logData);
        $logs = collect();

        foreach ($logRows as $row) {
            $logFields = explode(',', $row);
            if (count($logFields) > 1) {
                $log = new Log([
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
                ]);

                $logs->push($log);
            }
        }

        return $logs->sortByDesc('date');
    }
}
