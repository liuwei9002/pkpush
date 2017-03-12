<?php
/**
 * User: Peter Wang
 * Date: 17/1/20
 * Time: 上午10:42
 */

namespace App\Lib\Command;


use App\Lib\Support\Xtrait\Cmd;
use Trensy\Foundation\Command\Base as CmdBase;

class Base extends CmdBase
{
    use Cmd;

    public function __construct()
    {
        parent::__construct();
    }
}