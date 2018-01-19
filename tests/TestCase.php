<?php

namespace AaronAdrian\Salutaravel\Tests;

use AaronAdrian\Salutaravel\SalutaravelServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;


class TestCase extends OrchestraTestCase
{

    protected function getPackageProviders($app)
    {
        return [SalutaravelServiceProvider::class];
    }

    protected function getInvalidSuffixMessage()
    {
        return 'The suffix you selected is invalid.  Please select from the following: "Sr.", "Jr.", "V", "IV", "III", "II", "I"';
    }

    protected function getInvalidTitleMessage()
    {
        return 'The title you selected is invalid.  Please select from the following: "Mr.", "Ms.", "Mrs.", "Dr."';
    }

}