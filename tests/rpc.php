<?php
/**
 * User: Peter Wang
 * Date: 17/3/9
 * Time: 下午6:22
 */
include "base.php";

$client = new \Trensy\Rpc\RpcClient("127.0.0.1", "9999", 2);
$rs = $client->get("/api/login", ['user'=>'wang']);
dump($rs);