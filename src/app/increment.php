<?php

namespace UnitTest\Sample;

use PDO;

/**
 * Increment a value in MySQL
 */
class Increment
{
    protected $pdo;

    protected $rdb      = "mysql";
    protected $host     = "localhost";
    protected $username = "root";
    protected $password = '';
    protected $dbname   = "test";
    protected $charset  = "utf8";
    protected $options  = [
        PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    const Table_Name = "atomic_counter";
    const Schema     = [
        'id'    => 'int',
        'count' => 'int',
    ];

    /**
     * initializer
     */
    public function __construct()
    {
        $dsn = "$this->rdb:" . join(';', [
                "dbname=$this->dbname",
                "host=$this->host",
                "charset=$this->charset",
            ]);

        $this->pdo = new PDO(
            $dsn,
            $this->username,
            $this->password,
            $this->options
        );
    }

    public function count_up($id)
    {
        $query     = 'UPDATE atomic_counter SET count = count + 1 WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
