<?php
/**
 * User: Peter Wang
 * Date: 17/2/9
 * Time: 下午5:46
 */

namespace App\Glob\Service\Wx;


use App\Lib\Dao\Wx\WxpubMenuDao;

class WxMenuService
{

    public function getAll($fstatus=null)
    {
        $obj = new WxpubMenuDao();
        $where = [];

        if($fstatus !== null){
            $where['fstatus'] = $fstatus;
        }
        
        $list = $obj->gets($where, "fsort ASC, created_at DESC");
        if(!$list) return [];
        $resultTmp = [];
        $result = [];
        foreach ($list as $v){
            $resultTmp[$v['pid']][] = $v;
        }

        $pTmp = $resultTmp[0];
        foreach ($pTmp as &$v){
            $result[$v['id']] = $v;
            $result[$v['id']]['child'] = array_isset($resultTmp, $v['id']);
        }
        return $result;
    }

    public function getById($id){
        $obj = new WxpubMenuDao();
        $where = [];
        $where['id'] = $id;
        return $obj->get($where);
    }
    
    
}