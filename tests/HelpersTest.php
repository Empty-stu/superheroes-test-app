<?php

namespace Tests;

class HelpersTest extends \PHPUnit\Framework\TestCase
{
    public function testMultilineStringSplitter()
    {
        $multilineString = "First string\r\nSecond string\r\nThird string";
        $superpowersArray = splitMultilineStringOnArrayOfStrings($multilineString);
        $this->assertSame(["First string", "Second string", "Third string"], $superpowersArray);
    }
}
