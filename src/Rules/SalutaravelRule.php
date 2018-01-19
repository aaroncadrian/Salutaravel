<?php

namespace AaronAdrian\Salutaravel\Rules;


use Illuminate\Contracts\Validation\Rule;

abstract class SalutaravelRule implements Rule
{
    /**
     * Stores a collection containing the salutation options from the config file.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $options;

    /**
     * Return the name of the salutation.
     * The plural of this name will be used build the config key
     *
     * @see SalutaravelRule::configKey()
     *
     * @return string
     */
    abstract protected function salutation();

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->options = collect(config($this->configKey()));

    }

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
        return $this->options->contains($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return str_replace_array('?', [$this->salutation(), $this->optionsList()], 'The ? you selected is invalid.  Please select from the following: ?');
    }

    /**
     * Get a comma separated list of all options wrapped in quotation marks.
     *
     * @return string
     */
    public function optionsList()
    {
        return $this->options->map(function($option){
            return '"' . $option . '"';
        })->implode(', ');
    }

    /**
     * Get the config key of the options array.
     *
     * Salutation name comes from plural of value returned from salutation method.
     * @see SalutaravelRule::salutation()
     *
     * @return string
     */
    protected function configKey()
    {
        return str_replace_first('?', str_plural($this->salutation()), 'salutaravel.?');
    }
}