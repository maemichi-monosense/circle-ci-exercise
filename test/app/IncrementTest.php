<?php

namespace UnitTest\Sample;

class IncrementTest extends \PHPUnit_Framework_TestCase
{
    // Object to be tested
    private $target;
    // Mocks
    private $statement;
    private $connection;
    // PDO
    private $pdo;

    public function setUp()
    {
        $this->target = new Increment();
        $this->pdo = new \PDO('mysql:dbname=test;');
    }
}
