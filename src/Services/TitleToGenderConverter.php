<?php

namespace AaronAdrian\Salutaravel\Services;

use AaronAdrian\Salutaravel\Contracts\TitleToGenderConverter as Contract;

class TitleToGenderConverter implements Contract
{
    public function handle($title)
    {
        return config('salutaravel.titles')[$title];
    }
}