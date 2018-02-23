<?php

namespace AaronAdrian\Salutaravel\Tests\Rules;


use AaronAdrian\Salutaravel\Rules\ValidTitle;
use AaronAdrian\Salutaravel\Tests\TestCase;

class ValidTitleRuleTest extends TestCase
{
    public function rule()
    {
        return new ValidTitle;
    }

    public function testValidTitleRule()
    {
        $this->assertTrue($this->rule()->passes('title', 'Mrs.'));
    }

    public function testInvalidTitleDoesNotPass()
    {
        $this->assertFalse($this->rule()->passes('title', 'Mrss.'));
    }

    public function testValidTitleRuleMessage()
    {
        $this->assertEquals($this->rule()->message(), $this->getInvalidTitleMessage());
    }

}