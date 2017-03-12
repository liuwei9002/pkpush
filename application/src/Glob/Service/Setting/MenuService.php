<?php
/**
 * User: Peter Wang
 * Date: 17/2/6
 * Time: 下午12:21
 */

namespace App\Glob\Service\Setting;


use App\Lib\Dao\Setting\AdminAccessDao;
use App\Lib\Dao\Setting\AdminMenuDao;

class MenuService
{
    public function getAll($active="", $fstatus=1)
    {
        $objMenu = new AdminMenuDao();
        $where=[];
        $where['pid'] = 0;
        //3代表所有
        if($fstatus !=3) $where['fstatus'] = $fstatus;
        $pMenu = $objMenu->field("id,name,access_id,pid,fstatus,icon,fsort")->gets($where, "fsort ASC");
        if(!$pMenu) return [];
        $subWhere = [];
        if($fstatus !=3) $subWhere['fstatus'] = $fstatus;
        $subWhere['pid'] = ["!=", 0];
        $all = $objMenu->field("id,name,access_id,pid,fstatus,icon,fsort")->gets($subWhere, "fsort ASC");
        if(!$all) return $pMenu;

        $objAccess = new AdminAccessDao();
        $where = [];
        $where['ftype'] = 1;
        $access = $objAccess->gets($where, " ftype DESC");

        foreach ($pMenu as &$v){
            $pid = $v['id'];
            foreach ($all as $allv){
                foreach ($access as $acv){
                    if($acv['id'] == $allv['access_id']){
                        if($acv['route'] == $active){
                            $acv['active'] = "active";
                        }else{
                            $acv['active'] = "";
                        }
                        $allv['access'] = $acv;
                        break;
                    }
                }
                if($allv['pid'] == $pid){
                    $v['child'][] = $allv;
                    if(isset($allv['access']['active']) && $allv['access']['active']){
                        $v['active'] = "active";
                    }
                }
            }
            foreach ($access as $acv){
                if(!isset($v['access'])){
                    if($acv['id'] == $v['access_id']){
                        $v['access'] = $acv;
                        break;
                    }
                }
            }
        }
        return $pMenu;
    }

    public function getRoot()
    {
        $objMenu = new AdminMenuDao();
        $where=[];
        $where['pid'] = 0;
        $where['fstatus'] = 1;
        $pMenu = $objMenu->field("id,name,access_id,pid,fstatus,icon,fsort")->gets($where, "fsort ASC");
        return $pMenu;
    }

    public function add($pid, $name, $accessid, $fsort, $icon, $fstatus)
    {
        $data = [];
        $data['pid'] = $pid;
        $data['name'] = $name;
        $data['access_id'] = $accessid;
        $data['fsort'] = $fsort;
        $data['icon'] = $icon;
        $data['fstatus'] = $fstatus;
        $objMenu = new AdminMenuDao();
        return $objMenu->insert($data);
    }

    public function getById($id)
    {
        $objMenu = new AdminMenuDao();
        return $objMenu->get(["id"=>$id]);
    }

    public function delById($id)
    {
        $objMenu = new AdminMenuDao();
        return $objMenu->delete(["id"=>$id]);
    }

    public function updateById($id, $update)
    {
        $objMenu = new AdminMenuDao();
        return $objMenu->update($update, ["id"=>$id]);
    }
}