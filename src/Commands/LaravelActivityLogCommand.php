<?php

namespace Cetiia\LaravelActivityLog\Commands;

use Illuminate\Console\Command;

class LaravelActivityLogCommand extends Command
{
    public $signature = 'laravel-activity-log';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
