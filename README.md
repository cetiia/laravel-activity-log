# This package is for collect all activity log

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cetiia/laravel-activity-log.svg?style=flat-square)](https://packagist.org/packages/cetiia/laravel-activity-log)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/cetiia/laravel-activity-log/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/cetiia/laravel-activity-log/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/cetiia/laravel-activity-log/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/cetiia/laravel-activity-log/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/cetiia/laravel-activity-log.svg?style=flat-square)](https://packagist.org/packages/cetiia/laravel-activity-log)

## Installation

You can install the package via composer:

```bash
composer require cetiia/laravel-activity-log
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="activity-log-migrations"
php artisan migrate
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-activity-log-views"
```
