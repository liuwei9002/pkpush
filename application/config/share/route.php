<?php
return [
    [
        "name" => "glob",
        "prefix" => "",
        "domain" => "",
        "middleware" => ['authorize', 'adminaccess', 'adminglob'],
        "routes" => [
            //$method,$path,$uses,$middleware
            ['get', '/', "glob/index/index"],
            ['any', '/recaptcha/<type=null:\w+>', 'glob/captcha/recaptcha'],
            ['any', '/checkcaptcha/<type=null:\w+>', 'glob/captcha/checkcaptcha'],
            ['any', '/login', 'glob/account/login'],
            ['any', '/logout', 'glob/account/logout'],
            //权限
            ['get', '/access/index', 'glob/setting@access/index'],
            ['get', '/access/add', 'glob/setting@access/add'],
            ['post', '/access/doadd', 'glob/setting@access/doadd'],
            ['get', '/access/delete/<id:\d+>', 'glob/setting@access/delete'],
            ['get', '/access/edit/<id:\d+>', 'glob/setting@access/edit'],
            ['post', '/access/doedit/<id:\d+>', 'glob/setting@access/doedit'],
            //菜单
            ['get', '/menu/index', 'glob/setting@menu/index'],
            ['get', '/menu/add', 'glob/setting@menu/add'],
            ['post', '/menu/doadd', 'glob/setting@menu/doadd'],
            ['get', '/menu/updatestatus/<id:\d+>/<status:\d+>', 'glob/setting@menu/updatestatus'],
            ['get', '/menu/del/<id:\d+>', 'glob/setting@menu/del'],
            ['get', '/menu/edit/<id:\d+>', 'glob/setting@menu/edit'],
            ['get', '/menu/doedit/<id:\d+>', 'glob/setting@menu/doedit'],
            //权限组管理
            ['get', '/access_group/index', 'glob/setting@accessgroup/index'],
            ['get', '/access_group/add', 'glob/setting@accessgroup/add'],
            ['post', '/access_group/doadd', 'glob/setting@accessgroup/doadd'],
            ['get', '/access_group/edit/<id:\d+>', 'glob/setting@accessgroup/edit'],
            ['post', '/access_group/doedit/<id:\d+>', 'glob/setting@accessgroup/doedit'],
            ['get', '/access_group/del/<id:\d+>', 'glob/setting@accessgroup/del'],
            ['get', '/access_group/adduser/<id:\d+>', 'glob/setting@accessgroup/addUser'],
            ['get', '/access_group/deluser/<id:\d+>-<uid:\d+>', 'glob/setting@accessgroup/deluser'],
            ['any', '/access_group/doadduser/<id:\d+>', 'glob/setting@accessgroup/doadduser'],
            //用户管理
            ['get', '/account/userlist', 'glob/setting@account/userlist'],
            ['get', '/account/add', 'glob/setting@account/add'],
            ['post', '/account/doadd', 'glob/setting@account/doadd'],
            ['get', '/account/deluser/<id:\d+>', 'glob/setting@account/deluser'],
            ['get', '/account/editpwd', 'glob/setting@account/editpwd'],
            ['post', '/account/doeditpwd', 'glob/setting@account/doeditpwd'],
            //微信公众号管理
            ['get', '/wx/index', 'glob/wx@index/index'],
            ['get', '/wx/menulist/<appName:\w+>', 'glob/wx@index/menulist'],
            ['get', '/wx/add/<appName:\w+>/<pid=0:\d+>', 'glob/wx@index/add'],
            ['post', '/wx/doadd/<appName:\w+>/<pid=0:\d+>', 'glob/wx@index/doadd'],
            ['get', '/wx/edit/<appName:\w+>/<id=0:\d+>', 'glob/wx@index/edit'],
            ['post', '/wx/doedit/<appName:\w+>/<id=0:\d+>', 'glob/wx@index/doedit'],
            ['get', '/wx/delete/<appName:\w+>/<id=0:\d+>', 'glob/wx@index/delete'],
            ['get', '/wx/upwx/<appName:\w+>', 'glob/wx@index/upwx'],
            //用户管理
            ['get', '/user/index/<page=1:\d+>', 'glob/user@index/index'],
            ['get', '/user/lock/<uid:\d+>', 'glob/user@index/lock'],
            //ppt管理
            ['get', '/ppt/index/<page=1:\d+>', 'glob/ppt@index/index'],
            ['get', '/ppt/add', 'glob/ppt@index/add'],
            ['post', '/ppt/doadd', 'glob/ppt@index/doadd'],
            ['get', '/ppt/edit/<id:\d+>', 'glob/ppt@index/edit'],
            ['get', '/ppt/del/<id:\d+>', 'glob/ppt@index/del'],
            ['post', '/ppt/edit', 'glob/ppt@index/doedit'],
            ['get', '/ppt/tags', 'glob/ppt@tags/index'],
            ['get', '/ppt/tags/add', 'glob/ppt@tags/add'],
            ['post', '/ppt/tags/doadd', 'glob/ppt@tags/doadd'],
            ['get', '/ppt/tags/edit/<id:\d+>', 'glob/ppt@tags/edit'],
            ['post', '/ppt/tags/doedit', 'glob/ppt@tags/doedit'],
            ['get', '/ppt/tags/del/<id:\d+>', 'glob/ppt@tags/del'],

        ],
    ],
    //微信前端
    [
        "name" => "wx",
        "prefix" => "wx",
        "domain" => "",
        "middleware" => [],
        "routes" => [
            //$method,$path,$uses,$middleware
            ['any', '/<appName=null:\w+>', "wx/wx/index"],
        ]
    ]
];