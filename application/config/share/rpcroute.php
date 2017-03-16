<?php
return [
    [
        "name" => "rpc",
        "prefix" => "api",
        "domain" => "",
        "middleware" => [],
        "routes" => [
            //$path,$uses,$middleware
            ['/front/login', "rpc/user@index/login"],
            ['/front/register', "rpc/user@index/register"],
            ['/front/validRegister', "rpc/user@index/validRegister"],
            ['/admin/login', "rpc/admin@user@index/login"],
            ['/admin/getUserById', "rpc/admin@user@index/getUserById"],
            ['/admin/getAllUser', "rpc/admin@user@index/getAllUser"],
        ]
    ]
];