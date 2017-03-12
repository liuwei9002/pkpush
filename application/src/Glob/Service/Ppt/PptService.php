<?php
/**
 * User: Peter Wang
 * Date: 17/2/25
 * Time: 上午9:45
 */

namespace App\Glob\Service\Ppt;


use App\Lib\Dao\Ppt\PptMainDao;
use App\Lib\Dao\Ppt\PptTagMainDao;
use App\Lib\Dao\Ppt\PptTagSubDao;
use App\Lib\Dao\User\UsersDao;

class PptService
{
    
    public function pptList($where, $orderBy, $page, $pageSize)
    {
        $obj = new PptMainDao();
        list($list, $count, $totalPage) = $obj->pager($where, $page, $pageSize, $orderBy);
        if($list){
            $userIds = [];
            $pptIds = [];
            foreach ($list as $v){
                $userIds[] = $v['uid'];
                $pptIds[] = $v['id'];
            }

            $userDao = new UsersDao();
            $users = $userDao->gets(['id'=>['in', $userIds]]);

            $pptsubDao = new PptTagSubDao();
            $pptMainDao = new PptTagMainDao();
            foreach ($list as $k=>$v){
                foreach ($users as $uv){
                    if($v['uid'] == $uv['id']){
                        $list[$k]['user'] = $uv;
                    }
                }
                $list[$k]['tags'] = [];
                $pptSubTagIds = $pptsubDao->getField("tag_id",['ppt_id'=>$v['id']], true);
                if($pptSubTagIds){
                    $tags = $pptMainDao->gets(['id'=>['in', $pptSubTagIds]]);
                    $list[$k]['tags'] = $tags;
                }
            }

        }

        return [$list, $totalPage];
    }

    public function tagsList()
    {
        $obj = new PptTagMainDao();
        $orderBy = "fsort ASC, created_at";
        $tags= $obj->gets([], $orderBy);
        $result = [];
        if(!$tags) return $result;

        foreach ($tags as $v){
            if($v['pid'] == 0){
                if(isset($result[$v['id']])){
                    $result[$v['id']] = array_merge($result[$v['id']], $v);
                }else{
                    $result[$v['id']] = $v;
                }
            }else{
                $result[$v['pid']]['child'][md5(json_encode($v))] = $v;
            }
        }

        return $result;

    }

    public function tags($where=[])
    {
        $obj = new PptTagMainDao();
        $orderBy = "fsort ASC, created_at";
        return $obj->gets($where, $orderBy);
    }

    /**
     * 获取色系
     */
    public function getColors()
    {
        return [
            "彩色","红色","黄色","绿色","黑白"
        ];
    }

    /**
     * 获取员工账号
     */
    public function getEmployee()
    {
        $obj = new UsersDao();
        return $obj->gets(['is_employee'=>1]);
    }

}