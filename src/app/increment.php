<?php

namespace UnitTest\Sample;

/**
 * Increment a value in MySQL
 */
class Increment
{
    const Host = "localhost";
    const User = "ubuntu";
    const Pass = '';
    const DBName = "circle_test";

    private $link;

    /**
     * initializer
     */
    public function __construct()
    {
        $this->link = new mysqli(self::Host, self::User, self::Pass, self::DBName);
        if ($this->mysqli->connect_error) {
            echo $this->mysqli->connect_error;
            exit;
        } else {
            $this->mysqli->set_charset("utf8");
        }
    }

    function __destruct()
    {
        $this->mysqli->close();
    }
}
