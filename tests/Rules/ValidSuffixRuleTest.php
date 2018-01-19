<?php

namespace AaronAdrian\Salutaravel\Tests\Rules;


use AaronAdrian\Salutaravel\Rules\ValidSuffix;
use AaronAdrian\Salutaravel\Tests\TestCase;

class ValidSuffixRuleTest extends TestCase
{
    public function getRule()
    {
        return new ValidSuffix;
    }

    public function testValidSuffixPasses()
    {
        $rule = $this->getRule();
        $this->assertTrue($rule->passes('suffix', 'Jr.'));
    }

    public function testInvalidSuffixDoesNotPass()
    {
        $rule = $this->getRule();
        $this->assertFalse($rule->passes('suffix', 'IIII'));
    }

    public function testMessage()
    {
        $rule = $this->getRule();
        $this->assertEquals($rule->message(), $this->getInvalidSuffixMessage());
    }

}