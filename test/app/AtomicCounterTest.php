<?php

namespace UnitTest\Sample\Test;

use PHPUnit\Framework\TestCase;
use UnitTest\Sample\App\AtomicCounter;

class AtomicCounterTest extends TestCase
{
    // Object to be tested
    /**
     * @var AtomicCounter
     */
    public $target;

    public function setUp()
    {
        $this->target = new AtomicCounter();
    }

    public function testTwo()
    {
        $this->assertEquals(2, 1 + 1);
    }

    public function testCountUp($id = 1)
    {
        $init_count = $this->target->get_count($id);
        $new_count  = $this->target->count_up($id);
        $this->assertEquals($init_count + 1, $new_count, 'The count should be incremented.');
    }
}
