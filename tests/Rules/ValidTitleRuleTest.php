<?php

namespace AaronAdrian\Salutaravel\Tests\Rules;


use AaronAdrian\Salutaravel\Rules\ValidTitle;
use AaronAdrian\Salutaravel\Tests\TestCase;

class ValidTitleRuleTest extends TestCase
{
    public function getRule()
    {
        return new ValidTitle;
    }

    public function testValidTitleRule()
    {
        $rule = $this->getRule();
        $this->assertTrue($rule->passes('title', 'Mrs.'));
    }

    public function testInvalidTitleDoesNotPass()
    {
        $rule = $this->getRule();
        $this->assertFalse($rule->passes('title', 'Mrss.'));
    }

    public function testValidTitleRuleMessage()
    {
        $rule = $this->getRule();
        $this->assertEquals($rule->message(), $this->getInvalidTitleMessage());
    }

}