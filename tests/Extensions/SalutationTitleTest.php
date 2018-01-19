<?php

namespace AaronAdrian\Salutaravel\Tests\Rules;


use AaronAdrian\Salutaravel\Exceptions\SalutaravelException;
use AaronAdrian\Salutaravel\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class SalutationTitleTest extends TestCase
{
    public function testValidTitlePasses()
    {
        $this->assertTrue($this->getValidator('Ms.')->passes());
    }

    public function testExceptionThrownForInvalidRuleParameter()
    {
        $this->expectException(SalutaravelException::class);
        $this->expectExceptionMessage($this->getInvalidParameterExceptionMessage());

        $validator = Validator::make([
            'title' => 'Mr.'
        ], [
            'title' => 'salutation:titles' // Should be 'salutation:title'
        ]);
        $this->assertTrue($validator->passes());
    }

    public function testExceptionThrownForNoRuleParameter()
    {
        $this->expectException(SalutaravelException::class);
        $this->expectExceptionMessage($this->getNoParameterExceptionMessage());

        $validator = Validator::make([
            'title' => 'Mrs.'
        ], [
            'title' => 'salutation' // Should be 'salutation:title'
        ]);

        $this->assertTrue($validator->passes());
    }

    public function testInvalidTitleDoesNotPass()
    {
        $this->assertTrue($this->getValidator('Mrs')->fails()); // Mrs is not a valid title. It should be Mrs.
    }

    public function getValidator($value)
    {
        return Validator::make([
            'title' => $value
        ], [
            'title' => 'salutation:title'
        ]);
    }

    public function getNoParameterExceptionMessage()
    {
        return 'Salutation validation rule must contain one of the following parameters: "title", "suffix"';
    }

    public function getInvalidParameterExceptionMessage()
    {
        return 'The parameter "titles" is not valid for the Salutation validation rule';
    }
}