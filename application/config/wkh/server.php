<?php
/**
 * User: Peter Wang
 * Date: 16/9/20
 * Time: 下午7:08
 */
return [
    "name" => "daocang",
//    "servers" => ['httpd','job'],
//    "servers" => ['httpd'],
    "servers" => ['httpd', 'rpc', 'job'],
    "httpd" => [
        "server" => [
            "host" => "0.0.0.0",
            "port" => "8888",
            "mem_reboot_rate" => 0.8,//可用内存达到多少自动重启
            "auto_reload" => "10:00",//每天10点重启
            "log_file" => STORAGE_PATH . "/tmp/log",
            'static_path' => [
                "^\/static" => ROOT_PATH . '/resource/static',
                "^\/pptpreview" => STORAGE_PATH . "/uploads/pptpreview"
            ],
            "static_expire_time" => 86400,
            "task_fail_log" => STORAGE_PATH . "/tmp/task_fail_log",
            "task_retry_count" => 2,
            "task_timeout" => 1,
            "serialization" => 1,
            "view" => [
//        "diy"=>\App\Lib\Handle\ViewHandle::class,
                "path" => APPLICATION_PATH . "/templates/default",
                "compile_path" => STORAGE_PATH . "/compile",
                "page404" => "page404"
            ],
            "gzip" => 4,
            //是否后台运行, 推荐设置0
            'daemonize' => 0,
            //设置为CPU的1-4倍最合理
            'worker_num' => 8,
            /**
             * 1，轮循模式，收到会轮循分配给每一个worker进程
             * 2，固定模式，根据连接的文件描述符分配worker。这样可以保证同一个连接发来的数据只会被同一个worker处理
             * 3，抢占模式，主进程会根据Worker的忙闲状态选择投递，只会投递给处于闲置状态的Worker
             * 4，IP分配，根据客户端IP进行取模hash，分配给一个固定的worker进程。可以保证同一个来源IP的连接数据总会被分配到同一个worker进程。算法为 ip2long(ClientIP) % worker_num
             * 5，UID分配，需要用户代码中调用$serv->bind()将一个连接绑定1个uid。然后swoole根据UID的值分配到不同的worker进程。算法为 UID % worker_num，如果需要使用字符串作为UID，可以使用crc32(UID_STRING)
             */
            "dispatch_mode" => 3,
            //一般设置为CPU核数的1-4倍，在swoole中reactor_num最大不得超过CPU核数*4。
            'reactor_num' => 8,
            "task_worker_num" => 1,//task worker 数量
            "max_request" => 10000,
            'heartbeat_check_interval' => 10,
            'heartbeat_idle_time' => 60,
        ],
    ],
    "job" => [
        "server" => [
            "auto_reload" => "10:00",//每天10点重启
            //是否后台运行, 推荐设置0
            'daemonize' => 0,
            //worker数量，推荐设置和cpu核数相等
            'worker_num' => 4,
            "mem_reboot_rate" => 0.8,//可用内存达到多少自动重启
            "serialization" => 1,
            "timer_tick" => 500,//每隔多长执行一次,单位毫秒
        ],
        "perform" => [
            "clearlog" => [
                "sleep" => 1,//执行一次sleep多长时间
                "only_one" => 1,//是否只能插入一次数据
                "max_attempts" => 5,//失败后最多重试多少次
                "fail_on_output" => false//是否输出
            ],
            "heart" => [
                "sleep" => 1,//执行一次sleep多长时间
                "only_one" => 0,//是否只能插入一次数据
                "max_attempts" => 5,//失败后最多重试多少次
            ],
        ]
    ]
];