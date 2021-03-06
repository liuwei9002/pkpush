<?php
/**
 * Trensy Framework
 *
 * PHP Version 7
 *
 * @author          kaihui.wang <hpuwang@gmail.com>
 * @copyright      trensy, Inc.
 * @package         trensy/framework
 * @version         1.0.7
 */

namespace Trensy\Foundation\Command\Job;

use Trensy\Config\Config;
use Trensy\Job\JobServer;
use Trensy\Support\Arr;
use Trensy\Support\Dir;
use Trensy\Support\ElapsedTime;
use Trensy\Support\Log;

class JobBase
{
    public static function operate($cmd, $output, $input)
    {
        ElapsedTime::setStartTime(ElapsedTime::SYS_START);
        $root = Dir::formatPath(ROOT_PATH);
        $config = Config::get("server.job");
        $appName = Config::get("server.name");

        if (!$appName) {
            Log::sysinfo("server.name not config");
            exit(0);
        }

        if (!$config) {
            Log::sysinfo("job config not config");
            exit(0);
        }

        if (!isset($config['server'])) {
            Log::sysinfo("job.server config not config");
            exit(0);
        }


        if ($input->hasOption("daemonize")) {
            $daemonize = $input->getOption('daemonize');
            $config['server']['daemonize'] = $daemonize == 0 ? 0 : 1;
        }

        self::doOperate($cmd, $config, $root, $appName, $output);
    }


    public static function doOperate($command, array $config, $root, $appName, $output)
    {
        $defaultConfig = [
            //是否后台运行, 推荐设置0
            'daemonize' => 0,
            //worker数量，推荐设置和cpu核数相等
            'worker_num' => 2,
            "mem_reboot_rate" => 0,//可用内存达到多少自动重启
            "serialization" => 1
        ];

        $config['server'] = Arr::merge($defaultConfig, $config['server']);
        $config['server']['name'] = $appName;

        $serverName = $appName . "-job";
        $serverMaster = $appName . "-job-master";
        exec("ps axu|grep " . $serverMaster . "$|grep -v grep|awk '{print $2}'", $masterPidArr);
        $masterPid = $masterPidArr ? current($masterPidArr) : null;

        if ($command === 'start' && $masterPid) {
            Log::sysinfo("$serverName already running");
            return;
        }

        if ($command !== 'start' && $command !== 'restart' && !$masterPid) {
            Log::sysinfo("$serverName not run");
            return;
        }
        // execute command.
        switch ($command) {
            case 'status':
                if ($masterPid) {
                    Log::sysinfo("$serverName already running");
                } else {
                    Log::sysinfo("$serverName not run");
                }
                break;
            case 'clear':
                $jobServer = new JobServer($config, $root);
                $jobServer->clear();
                Log::sysinfo("$serverName clear success ");
                break;
            case 'start':
                self::start($config, $root);
                break;
            case 'stop':
                self::stop($appName);
                Log::sysinfo("$serverName stop success ");
                break;
            case 'restart':
                self::stop($appName);
               self::start($config, $root);
                break;
            case 'reload':
                self::reload($appName);
                Log::sysinfo("$serverName reload success ");
//                self::start($config, $root);
                break;
            default :
                exit(0);
        }
    }

    protected static function stop($appName)
    {
        $killStr = $appName . "-job";
        exec("ps axu|grep " . $killStr . "|grep -v grep|awk '{print $2}'|xargs kill -9");
        sleep(1);
    }

    protected static function reload($appName)
    {
        $killStr = $appName . "-job-worker";
        $execStr = "ps axu|grep " . $killStr . "|grep -v grep|awk '{print $2}'|xargs kill -USR1";
        exec($execStr);
    }

    protected static function start($config, $root)
    {
        $jobServer = new JobServer($config, $root);
        $jobServer->start();
    }

}