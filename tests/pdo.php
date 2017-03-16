<?php
/**
 * User: Peter Wang
 * Date: 17/3/15
 * Time: 下午5:08
 */
include "base.php";

class Test extends \Trensy\Foundation\Storage\Pdo
{
    protected $tableName = "test";
}

class Test2 extends \Trensy\Foundation\Storage\Pdo
{
    protected $tableName = "test2";
}

$obj = new Test();
$data['data'] = time();

$id = $obj->insert($data);
dump($id);
$obj = new Test2();
$id = $obj->insert($data);
dump($id);