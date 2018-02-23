<?php

namespace AaronAdrian\Salutaravel\Services;

class TitleToGenderConverter
{
    public function handle($title)
    {
        return config('salutaravel.titles')[$title];
    }
}