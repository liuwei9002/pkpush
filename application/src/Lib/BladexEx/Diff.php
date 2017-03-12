<?php
/**
 * User: Peter Wang
 * Date: 17/1/9
 * Time: 上午10:05
 */

namespace App\Lib\BladexEx;


class Diff
{

    public function perform($param)
    {
        return '<?php \App\Lib\BladexEx\Diff::deal('.$param.'); ?>';
    }

    public static function deal($inputData, $selfData, $tag='selected'){
        if(is_array($inputData)){
            if(in_array($selfData, $inputData)){
                echo $tag;
            }else{
                echo "";
            }
        }else{
            if($inputData == $selfData){
                echo $tag;
            }else{
                echo "";
            }
        }

    }

}