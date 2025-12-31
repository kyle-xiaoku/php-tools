<?php

namespace Kyledong\Tests;

use Kyledong\PhpTools\Str;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    public function testLen()
    {
        $this->assertEquals(Str::len('hello'),5);
    }

    public function testSubstr()
    {
        $this->assertEquals(Str::substr('hello',1),'ello');
    }
}