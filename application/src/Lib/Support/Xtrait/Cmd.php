<?php

namespace App\Lib\Support\Xtrait;

use Trensy\Support\Dir;

trait Cmd
{
    protected $user = null;

    /**
     * 设置执行命令的用户
     *
     * @param $gitUser
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * 系统执行命令路径
     * @param $cms
     * @param $bin
     */
    public function whichBinPath($binName)
    {
        $binPath = $this->whichBin($binName);
        return substr($binPath, 0, (strlen($binPath)-strlen($binName)-1));
    }

    /**
     * 普通命令执行
     * @param $command
     * @param null $binPath
     * @param string $user
     * @return bool
     * @throws \Exception
     */
    public function exec($command, $binPath=null, $user=null){
        if($binPath) $command = Dir::formatPath($binPath) .$command;
        $command = $this->sudoCommandAsDaemonUser($command, $user);
        exec($command , $outRs, $rs);
        return $rs?$outRs:false;
    }

    /**
     * 执行有管道输入的命令
     *
     * @param $command
     * @param null $input 输入数据
     * @param null $cwd 当前执行路径
     * @param null $binPath 执行命令的路径
     * @param null $env 执行环境
     * @param null $user 执行用户
     * @return mixed
     * @throws \Exception
     */
    public function execCommand($command, $input=null, $cwd=null, $binPath=null, $env=null, $user=null)
    {
        if($binPath) $command = Dir::formatPath($binPath) .$command;
        $user = $user?$user:$this->user;
        $command = $this->sudoCommandAsDaemonUser($command, $user);
        $descriptorspec = array(
            0 => array("pipe", "r"),  // STDIN
            1 => array("pipe", "w"), //STDOUT
            2 => array('pipe', 'w')  // STDERR
        );
        $proc = proc_open($command, $descriptorspec, $pipes, $cwd, $env);

        if(is_resource($proc)){
            if ($input){
                fwrite($pipes[0], $input);
            }
        }

        $stderr = stream_get_contents($pipes[2]);
        if($stderr){
            dump($stderr);
        }

        $stdout = stream_get_contents($pipes[1]);
        // close used resources
        foreach($pipes as $pipe){
            fclose($pipe);
        }

        @proc_terminate($proc, 9/*SIGKILL*/);

        proc_close($proc);

        return $stdout;
    }

    /**
     * 根据用户执行
     *
     * @param $command
     * @param null $user
     * @return string
     * @throws \Exception
     */
    public function sudoCommandAsDaemonUser($command, $user=null) {
        if (!$user) {
            // No daemon user is set, so just run this as ourselves.
            return $command;
        }
        if (function_exists('posix_getuid')) {
            $uid = posix_getuid();
            $info = posix_getpwuid($uid);
            if ($info && $info['name'] == $user) {
                return $command;
            }
        }
        
//        $sudo = "/usr/bin/sudo";
        $sudo = $this->whichBin("sudo");
        if (!$sudo) {
            throw new \Exception("Unable to find 'sudo'!");
        }
        $str = $sudo . " -E -n -u {$user} -- {$command}";
        return $str;
    }

    /**
     * 查询命令全部路径
     * @param $str
     * @return bool
     */
    public function whichBin($str){
        exec("which {$str}", $result);
        if($result) return current($result);
        return false;
    }

    /**
     * 检查命令是否存在
     * @param $cmd
     * @return bool
     */
    public function checkCmd($cmd)
    {
        $cmdStr = "command -v " . $cmd;
        $check = $this->exec($cmdStr);
        if (!$check) {
            return false;
        } else {
            return current($check);
        }
    }


}