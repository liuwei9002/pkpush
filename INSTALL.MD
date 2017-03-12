1. 执行 chmod 0777 trensy

1. php.ini 添加 TRENSY_RUNMODE = test.{配置目录名}

1. 修改 application/config/{配置目录名}/storage.php server.pdo 的配置

1. 执行 sudo php trensy dbsync -i

1. 执行 sudo php trensy dbsync

1. 启动 sudo php trensy server:restart

### 热更新
```
sudo apt-get install inotify-tools
sudo chmod 0777 reload.sh
```