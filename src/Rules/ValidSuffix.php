<?php

namespace AaronAdrian\Salutaravel\Rules;


use Illuminate\Support\Collection;

class ValidSuffix extends SalutaravelRule
{
    protected function salutation()
    {
        return 'suffix';
    }

    /**
     * Return collection that will be searched for the given value.
     *
     * @return Collection
     */
    protected function options()
    {
        return collect(config('salutaravel.suffixes'));
    }
}
