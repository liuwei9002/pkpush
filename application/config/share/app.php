<?php
return [
    "date_default_timezone_set"=>"Asia/Shanghai",
    "memory_limit"=>"1024M",
    "session"=>[
        "name"=>"TSESSIONID",
        "cache_expire"=>60*60*2,
        "path"=>"/",
        "domain"=>"",
        "secure"=>false,
        "httponly"=>true,
    ],
    "aliases"=>[],
    "di"=>[],
    "command"=>[
         \App\Lib\Command\Mysqlschema::class 
    ],
    "middleware"=>[
        "authorize"=>\App\Glob\Middleware\Authorize::class,
        "adminaccess"=>\App\Glob\Middleware\AdminAccess::class,
        "adminglob"=>\App\Glob\Middleware\AdminGlob::class,
    ],
    "task"=>[],
    "log"=>"",
    "route"=>\App\Lib\Handle\RouteHandle::class,
    "rpcroute"=>\App\Lib\Handle\RpcRouteHandle::class,
    "email"=>[
        "server"=>[
            "smtp"=>"",
            "port"=>465,
            "username"=>"",
            "password"=>"",
            "encryption"=>"ssl",
        ]
    ],
    "salt_key"=>"2131@##2**&dasdasda",
    //微信配置
    "wx"=>[
        'trensy'=>[
//            "appId"=>"wx6c4560d4bd31e52c",
//            "appSecret"=>"1bc4fad6cdb94b75103cfebe764ad676",
//            "token"=>"weee23fss2",
//            "encodingAESKey"=>"sy8U07x7Z4prFQCgkQVCxJ9qOTMHU4u0FTC5CQnkFDI",
            "appId"=>"wxfe09b5a7aff41f38",
            "appSecret"=>"348aeb30a398060a0d4159b6ceaeb729",
            "token"=>"weee23fss2",
            "encodingAESKey"=>"",
        ]
    ],
    "test"=>"hello world",
];