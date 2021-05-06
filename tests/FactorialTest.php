<?php

use PHPUnit\Framework\TestCase;
use App\Factorial;

class FactorialTest extends TestCase {
  public function testExamples() {
    $this->assertEquals(1, Factorial::calculate(0), '0! should equal 1');
    $this->assertEquals(1, Factorial::calculate(1), '1! should equal 1');
    $this->assertEquals(2, Factorial::calculate(2), '2! should equal 2');
    $this->assertEquals(6, Factorial::calculate(3), '3! should equal 6');
  }
}
