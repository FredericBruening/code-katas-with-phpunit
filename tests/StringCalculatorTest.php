<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase {

    /** @test */
    function an_empty_string_adds_zero()
    {
        $calculator = new StringCalculator;

        $this->assertSame(0, $calculator->add(''));
    }


    /** @test */
    function it_finds_the_sum_of_a_single_number()
    {
        $calculator = new StringCalculator;

        $this->assertSame(1, $calculator->add('1'));
    }


    /** @test */
    function it_finds_the_sum_of_two_numbers()
    {
        $calculator = new StringCalculator;

        $this->assertSame(5, $calculator->add('1,4'));
    }


    /** @test */
    function it_finds_the_sum_of_any_amount_of_numbers()
    {
        $calculator = new StringCalculator;

        $this->assertSame(20, $calculator->add('1,1,1,1,1,5,5,5'));
    }

    /** @test */
    function it_accepts_a_newline_character_as_a_delimiter()
    {
        $calculator = new StringCalculator;

        $this->assertSame(10, $calculator->add("5\n5"));
    }

    /** @test */
    function negative_numbers_are_not_allowed()
    {
        $calculator = new StringCalculator;

        $this->expectException(Exception::class);

        $calculator->add('-1,-2');
    }

    /** @test */
    function numbers_greater_than_one_thousand_should_be_ignored()
    {
        $calculator = new StringCalculator;


        $this->assertSame(4, $calculator->add('4,1001'));
    }

    /** @test */
    function it_supports_custom_delimiters()
    {
        $calculator = new StringCalculator;

        $this->assertSame(9, $calculator->add("//;\n5;4"));
        $this->assertSame(14, $calculator->add("//:\n5:4:5"));
        $this->assertSame(9, $calculator->add("//]\n5]4"));
    }
}
