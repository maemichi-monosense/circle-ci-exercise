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
    /**
     * @var \PDO
     */
    private $pdo;

    public function setUp()
    {
        $this->target = new AtomicCounter();
        $this->pdo    = clone TestUtil::snatch_property($this->target, 'pdo');
        // DEBUG
        $databases = $this->pdo->query('SHOW DATABASES');
        $tables    = $this->pdo->query('SHOW TABLES');
        var_dump($databases, $tables);
        $databases->closeCursor();
        $tables->closeCursor();
    }

    public function testCountUp($id = 1)
    {
        $init_count = $this->target->get_count($id);
        $new_count  = $this->target->count_up($id);
        $this->assertEquals($init_count + 1, $new_count, 'The count should be incremented.');
    }
}
