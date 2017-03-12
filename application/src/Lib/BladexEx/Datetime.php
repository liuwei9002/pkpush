<?php
/**
 * User: Peter Wang
 * Date: 17/1/7
 * Time: 下午4:23
 */

namespace App\Lib\BladexEx;


class Datetime
{

    public function perform($timestamp)
    {
        return preg_replace('/(\d+)/', '<?php echo date("Y-m-d H:i:s", $1); ?>', $timestamp);
    }

}