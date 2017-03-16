<?php
/**
 * User: Peter Wang
 * Date: 17/3/9
 * Time: 下午6:22
 */
include "base.php";

$client = new \Trensy\Rpc\RpcClient("127.0.0.1", "9800", 1);
$rs = $client->get("/api/admin/login", ['account'=>'admin@admin.com', 'passwd'=>"111111"]);
dump($rs);