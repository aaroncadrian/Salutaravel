<?php

namespace AaronAdrian\Salutaravel\Rules;


use Illuminate\Contracts\Validation\Rule;

abstract class SalutaravelRule implements Rule
{
    protected $options;

    abstract protected function salutation();

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->options = collect(config(str_replace_first('?', $this->configKey(), 'salutaravel.?')));

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->options->contains($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return str_replace_array('?', [$this->salutationName(), $this->optionsList()], 'The ? you selected is invalid.  Please select from the following: ?');
    }

    public function optionsList()
    {
        return $this->options->map(function($option){
            return '"' . $option . '"';
        })->implode(', ');
    }

    protected function configKey()
    {
        return str_plural($this->salutation());
    }
}