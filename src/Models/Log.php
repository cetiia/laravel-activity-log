<?php

namespace Cetiia\LaravelActivityLog\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['user','ip','country','state','city','path','method','date','time','browser'];
}
