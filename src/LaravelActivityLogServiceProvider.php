<?php

namespace Cetiia\LaravelActivityLog;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelActivityLogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-activity-log')
            ->hasRoute('web')
            ->hasViews('laravel-activity-log')
            ->hasMigrations(array('create_logs_table'));
    }

    public function bootingPackage()
    {
        $this->app[\Illuminate\Contracts\Http\Kernel::class]->appendMiddlewareToGroup('web', \Cetiia\LaravelActivityLog\Middleware\LaravelActivityLogMiddleware::class);
    }
}
