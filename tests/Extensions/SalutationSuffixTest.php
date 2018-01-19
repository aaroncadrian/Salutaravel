<?php

namespace AaronAdrian\Salutaravel\Tests\Rules;


use AaronAdrian\Salutaravel\Exceptions\SalutaravelException;
use AaronAdrian\Salutaravel\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class SalutationSuffixTest extends TestCase
{
    public function testValidSuffixPasses()
    {
        $this->assertTrue($this->getValidator('IV')->passes());
    }

    public function testExceptionThrownForInvalidRuleParameter()
    {
        $this->expectException(SalutaravelException::class);
        $this->expectExceptionMessage($this->getInvalidParameterExceptionMessage());

        $validator = Validator::make([
            'suffix' => 'IV'
        ], [
            'suffix' => 'salutation:suffixes' // Should be 'salutation:suffix'
        ]);
        $this->assertTrue($validator->passes());
    }

    public function testExceptionThrownForNoRuleParameter()
    {
        $this->expectException(SalutaravelException::class);
        $this->expectExceptionMessage($this->getNoParameterExceptionMessage());

        $validator = Validator::make([
            'suffix' => 'IV'
        ], [
            'suffix' => 'salutation' // Should be 'salutation:suffix'
        ]);

        $this->assertTrue($validator->passes());
    }

    public function testInvalidSuffixDoesNotPass()
    {
        $this->assertTrue($this->getValidator('IIII')->fails()); // IIII is not a valid suffix
    }

    public function getValidator($value)
    {
        return Validator::make([
            'suffix' => $value
        ], [
            'suffix' => 'salutation:suffix'
        ]);
    }

    public function getNoParameterExceptionMessage()
    {
        return 'Salutation validation rule must contain one of the following parameters: "title", "suffix"';
    }

    public function getInvalidParameterExceptionMessage()
    {
        return 'The parameter "suffixes" is not valid for the Salutation validation rule';
    }
}