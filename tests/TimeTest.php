<?php

namespace Kyledong\Tests;

use Kyledong\PhpTools\Time;
use PHPUnit\Framework\TestCase;

class TimeTest extends TestCase
{
    public function testPrevious()
    {
        $this->assertEquals(Time::previous(1),date('Y-m-d H:i:s',strtotime('-1 day')));
    }

    public function testFuture()
    {
        $this->assertEquals(Time::future(1),date('Y-m-d H:i:s',strtotime('+1 day')));
    }
}