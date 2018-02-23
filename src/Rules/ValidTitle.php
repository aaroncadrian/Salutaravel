<?php

namespace AaronAdrian\Salutaravel\Rules;

use Illuminate\Support\Collection;

class ValidTitle extends SalutaravelRule
{

    protected function salutation()
    {
        return 'title';
    }

    /**
     * Return collection that will be searched for the given value.
     *
     * @return Collection
     */
    protected function options()
    {
        return collect(config('salutaravel.titles'))->keys();
    }
}
