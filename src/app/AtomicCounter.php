<?php

namespace UnitTest\Sample;

use PDO;

/**
 * Increment a value in MySQL
 */
class AtomicCounter
{
    protected $pdo;

    protected $rdb      = "mysql";
    protected $host     = "localhost";
    protected $username = "root";
    protected $password = '';
    protected $db_name  = "test";
    protected $charset  = "utf8";
    protected $options  = [
        PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    const Table_Name = "atomic_counter";
    const Schema     = [
        'id'    => PDO::PARAM_INT,
        'count' => PDO::PARAM_INT,
    ];

    /**
     * initializer
     */
    public function __construct()
    {
        $dsn = "$this->rdb:" . join(';', [
                "dbname=$this->db_name",
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

    public function set_DB_name($db_name)
    {
        $this->pdo->exec("USE $db_name");
    }

    /**
     * @param int $id
     *
     * @return int current count
     */
    public function get_count($id)
    {
        $query = '
SELECT count 
FROM atomic_counter 
WHERE id = :id
';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchObject()->count;
    }

    /**
     * @param int $id
     *
     * @return int new count
     */
    public function count_up($id)
    {
        $query     = '
UPDATE atomic_counter 
SET count = count + 1 
WHERE id = :id
';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchObject()->count;
    }
}
