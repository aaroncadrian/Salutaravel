<?php

namespace AaronAdrian\Salutaravel;


use Illuminate\Support\ServiceProvider;

class SalutaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/salutaravel.php', 'salutaravel');

    }

}