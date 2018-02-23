<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Titles
    |--------------------------------------------------------------------------
    |
    | This array consists of the titles that are used for the application.
    |
    */

    'titles' => [
        'Mr.' => 'M',
        'Ms.' => 'F',
        'Mrs.' => 'F',

        /*
         * Beware that if you are deriving genders from the title that a user submits,
         * "Dr." should be removed from this array, for this title does not represent a specific gender.
         */
        'Dr.' => 'M',
    ],

    /*
    |--------------------------------------------------------------------------
    | Suffixes
    |--------------------------------------------------------------------------
    |
    | This array consists of the suffixes that are used for the application.
    |
    */

    'suffixes' => [
        'Sr.',
        'Jr.',
        'V',
        'IV',
        'III',
        'II',
        'I',
    ],

    /*
    |--------------------------------------------------------------------------
    | Rules
    |--------------------------------------------------------------------------
    |
    | This array associates the parameter name of a rule with its rule class.
    | @see SalutaravelServiceProvider::bootValidationExtensions()
    |
    */

    'rules' => [
        'title' => \AaronAdrian\Salutaravel\Rules\ValidTitle::class,
        'suffix' => \AaronAdrian\Salutaravel\Rules\ValidSuffix::class,
    ]

];