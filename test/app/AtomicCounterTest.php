<?php

namespace UnitTest\Sample\Test;

use PHPUnit\Framework\TestCase;
use UnitTest\Sample\App\AtomicCounter;

class AtomicCounterTest extends TestCase
{
    // Object to be tested
    public $target;
    public $pdo;

    public function setUp()
    {
        $this->target = new AtomicCounter();
        $this->pdo    = clone TestUtil::snatch_property($this->target, 'pdo');
    }
}
