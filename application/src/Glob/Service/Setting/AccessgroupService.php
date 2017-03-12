<?php
/**
 * User: Peter Wang
 * Date: 17/2/6
 * Time: 上午10:43
 */

namespace App\Glob\Service\Setting;


use App\Lib\Dao\Setting\AccessGroupAccessDao;
use App\Lib\Dao\Setting\AccessGroupDao;
use App\Lib\Dao\Setting\AccessGroupUserDao;
use App\Lib\Dao\Setting\AdminUserDao;

class AccessgroupService
{
    /**
     * 添加权限组
     * @param $name
     * @param $access
     * @param $descr
     * @return bool
     */
    public function insert($name, $access, $descr)
    {
        $objGroup = new AccessGroupDao();

        $data = [];
        $data['name'] = $name;
        $data['descr'] = $descr;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $id = $objGroup->insert($data);
        if (!$id) return false;
        if ($access) {
            $objGroupAccess = new AccessGroupAccessDao();
            foreach ($access as $v) {
                $subData = [];
                $subData['access_id'] = $v;
                $subData['access_group_id'] = $id;
                $subData['created_at'] = date('Y-m-d H:i:s');
                $subData['updated_at'] = date('Y-m-d H:i:s');
                $objGroupAccess->insert($subData);
            }
        }
        return $id;
    }

    /**
     * 获取权限组列表
     */
    public function getList()
    {
        $objGroup = new AccessGroupDao();
        return $objGroup->gets();
    }

    /**
     * 删除
     * @param $id
     */
    public function del($id)
    {
        $objGroup = new AccessGroupDao();
        $objGroup->delete(['id' => $id]);
        $obj = new AccessGroupAccessDao();
        $obj->delete(['access_group_id' => $id]);
        $obj = new AccessGroupUserDao();
        $obj->delete(['access_group_id' => $id]);
    }

    /**
     * 通过id获取
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $objGroup = new AccessGroupDao();
        $info = $objGroup->get(['id' => $id]);
        if (!$info) return $info;
        $obj = new AccessGroupAccessDao();
        $access = $obj->getField("access_id", ['access_group_id' => $id], true);
        $info['access'] = $access;
        return $info;
    }

    /**
     * 编辑
     *
     * @param $name
     * @param $access
     * @param $descr
     * @return bool
     */
    public function edit($id, $name, $access, $descr)
    {
        $objGroup = new AccessGroupDao();
        $data = [];
        $data['name'] = $name;
        $data['descr'] = $descr;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $objGroup->update($data, ['id' => $id]);
        if ($access) {
            $objGroupAccess = new AccessGroupAccessDao();
            //先删除
            $objGroupAccess->delete(['access_group_id' => $id]);
            foreach ($access as $v) {
                $subData = [];
                $subData['access_id'] = $v;
                $subData['access_group_id'] = $id;
                $subData['created_at'] = date('Y-m-d H:i:s');
                $subData['updated_at'] = date('Y-m-d H:i:s');
                $objGroupAccess->insert($subData);
            }
        }
        return $id;
    }

    /**
     *  获取组用户
     *
     * @param $id
     */
    public function getGroupUser($id)
    {
        $obj = new AccessGroupUserDao();
        $where = [];
        $where['access_group_id'] = $id;
        $userIds = $obj->getField("uid", $where, true, "", "created_at ASC");

        $userObj = new AdminUserDao();
        $list = $userObj->gets();

        $user = [];
        $user2id = [];
        if($list){
            foreach ($list as $v){
                $user2id[$v['id']] = $v;
                $user2id[$v['id']]['tag'] = $v['display_name']." ".$v['email'];
                if(in_array($v['id'], $userIds)){
                    $user2id[$v['id']]['is_add'] = 1;
                    $user[] = $v;
                }
            }
        }

        return [$user, $user2id];
    }

    public function delGroupUser($uid, $id)
    {
        $obj = new AccessGroupUserDao();
        $where = [];
        $where['access_group_id'] = $id;
        $where['uid'] = $uid;
        $obj->delete($where);
        return true;
    }

    public function addGroupUser($users, $id)
    {
        $users = explode(",", $users);
        $obj = new AccessGroupUserDao();

        $userObj = new AdminUserDao();
        $users2email = $userObj->getField("id", [], true, "email");
        if($users) {
            foreach ($users as $user) {
                list($name, $email) = explode(" ", $user);
                if(isset($users2email[$email])){
                    $ruid = $users2email[$email];
                    $data = [];
                    $data['uid'] = $ruid;
                    $data['access_group_id'] = $id;
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['updated_at'] = date('Y-m-d H:i:s');
                    $obj->insert($data);
                }
            }
        }
        return true;
    }
}