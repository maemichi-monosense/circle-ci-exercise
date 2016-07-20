<?php

namespace UnitTest\Sample;

class AtomicCounterTest extends \PHPUnit_Framework_TestCase
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
