<?php
/**
 * User: Peter Wang
 * Date: 17/2/6
 * Time: 下午12:20
 */

namespace App\Glob\Service\Setting;


use App\Lib\Dao\Setting\AdminAccessDao;

class AccessService
{
    public function getById($ids, $ftype = 0)
    {
        $objAccess = new AdminAccessDao();
        $where = [];
        $where['id'] = ["in", $ids];
        if ($ftype) $where['ftype'] = $ftype;

        $data = $objAccess->gets($where, " ftype DESC");
        return $data;
    }


    public function getAccess($ftype = 0)
    {
        $objAccess = new AdminAccessDao();
        $where = [];
        if ($ftype) $where['ftype'] = $ftype;

        $data = $objAccess->gets($where, "root_type DESC, created_at DESC");

        $result = [];
        $tmp = [];
        //循环分组
        if ($data) {
            foreach ($data as $k => $v) {
                if($v['root_type'] == 2){
                    $key = "_menuGroupRoot";
                }else{
                    $keyTmp = explode("/", $v['route']);
                    $keyArr = isset($keyTmp[1]) ? $keyTmp[1] : $keyTmp[0];
//                    $endArr = explode("@", $keyArr);
//                    $key = end($endArr);
                    $key = str_replace("@", "-", $keyArr);
                }
                $tmp[$key][] = $v;
            }
            foreach ($tmp as $key => $rv) {
                $result[$key] = array_shift($rv);
                $result[$key]['child'] = $rv;
            }
        }
        return $result;
    }


    public function add($name, $route, $ftype, $isRoot)
    {
        $data = [];
        $data['name'] = $name;
        $data['route'] = $route;
        $data['ftype'] = $ftype;
        $data['root_type'] = $isRoot;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $objAccess = new AdminAccessDao();
        return $objAccess->insert($data);
    }


    public function editById($id, $name, $route, $ftype, $isRoot)
    {
        $data = [];
        $data['name'] = $name;
        $data['route'] = $route;
        $data['ftype'] = $ftype;
        $data['root_type'] = $isRoot;
        $data['updated_at'] = date('Y-m-d H:i:s');

        $objAccess = new AdminAccessDao();
        return $objAccess->update($data, ["id" => $id]);
    }


    public function delById($id)
    {
        $objAccess = new AdminAccessDao();
        return $objAccess->delete(["id" => $id]);
    }


    public function get($id)
    {
        $objAccess = new AdminAccessDao();
        $where = [];
        $where['id'] = $id;
        $data = $objAccess->get($where);
        return $data;
    }
}