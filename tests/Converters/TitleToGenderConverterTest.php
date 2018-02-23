<?php

namespace AaronAdrian\Salutaravel\Tests;


class TitleToGenderConverterTest extends TestCase
{
    /** @test */
    public function convert_title_to_gender()
    {
        $this->assertEquals('M', title_to_gender('Mr.'));
        $this->assertEquals('F', title_to_gender('Mrs.'));
    }

}