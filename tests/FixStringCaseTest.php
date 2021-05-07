<?php

use App\FixStringCase;
use PHPUnit\Framework\TestCase;

class FixStringCaseTest extends TestCase {
    public function testSampleTests()
    {
        $this->assertEquals("code", FixStringCase::solve("code"));
        $this->assertEquals("CODE", FixStringCase::solve("CODe"));
        $this->assertEquals("code", FixStringCase::solve("COde"));
        $this->assertEquals("code", FixStringCase::solve("Code"));
    }
}
