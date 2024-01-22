<?php

namespace App\Providers;

use App\Repositories\series\EloquentSeriesRepository;
use App\Repositories\series\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class
    ];
}
