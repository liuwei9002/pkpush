<?php
/**
 * User: Peter Wang
 * Date: 16/10/9
 * Time: 下午12:45
 */
return [
    "server"=>[
        "pdo"=>[
            "type" => "mysql",
            "prefix" => "dao_",
           "master" =>[
                "host" => "127.0.0.1",
                "user" => "root",
                "port" => "3306",
                "password" => "123456",
                "db_name" => "daocang",
                "timeout"=>1,
            ]
//            "master" =>[
//                "host" => "2tag.cn",
//                "user" => "root",
//                "port" => "3306",
//                "password" => "weare88",
//                "db_name" => "daocang_test1",
//                "timeout"=>1,
//                ]
        ],
        "redis"=>[
            "servers"=>[
            "tcp://127.0.0.1:6379",
            ],
            "options"=>[
                'prefix'  => 'daocang',
                'cluster' => 'redis',
                "timeout"=>1,
            ],
        ]
    ]
];