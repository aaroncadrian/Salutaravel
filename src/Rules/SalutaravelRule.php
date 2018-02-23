<?php

namespace AaronAdrian\Salutaravel\Rules;


use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Collection;

abstract class SalutaravelRule implements Rule
{
    /**
     * Return the name of the salutation.
     *
     * @return string
     */
    abstract protected function salutation();


    /**
     * Return collection that will be searched for the given value.
     *
     * @return Collection
     */
    abstract protected function options();

    /**
     * Determine if the value is one of the options from the collection.
     *
     * @see SalutaravelRule::$options
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->options()->contains($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return str_replace_array('?', [$this->salutation(), $this->options_list()], 'The ? you selected is invalid.  Please select from the following: ?');
    }

    /**
     * Get a comma separated list of all options wrapped in quotation marks.
     *
     * @return string
     */
    protected function options_list()
    {
        return $this->options()->map(function($option){
            return '"' . $option . '"';
        })->implode(', ');
    }
}