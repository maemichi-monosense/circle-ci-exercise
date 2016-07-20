<?php
/**
 * Created by PhpStorm.
 * User: Yuya
 * Date: 2016/07/20
 * Time: 16:50
 */

require __DIR__ . '/../src/app/AtomicCounter.php';
require __DIR__ . '/../test/app/TestUtil.php';

$pdo = \UnitTest\Sample\Test\TestUtil::snatch_property(new \UnitTest\Sample\App\AtomicCounter(), 'pdo');
// DEBUG
$databases = $pdo->query('SHOW DATABASES')
                 ->fetchAll(PDO::FETCH_COLUMN);
$tables    = $pdo->query('SHOW TABLES')
                 ->fetchAll(PDO::FETCH_COLUMN);
var_dump($databases, $tables);
