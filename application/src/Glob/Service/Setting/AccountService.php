<?php
/**
 * User: Peter Wang
 * Date: 17/2/4
 * Time: 下午5:21
 */

namespace App\Glob\Service\Setting;

use App\Lib\Dao\Setting\AdminUserDao;

class AccountService
{
    /**
     * 获取所有用户
     *
     * @return mixed
     */
    public function getAllUser()
    {
        $userObj = new AdminUserDao();
        return $userObj->gets([], "id desc");
    }

    /**
     * 删除用户
     *
     * @param $id
     * @return mixed
     */
    public function delUser($id)
    {
        $userObj = new AdminUserDao();
        return $userObj->delete(['id'=>$id]);
    }

    /**
     * 添加用户
     */
    public function addUser($email, $displayName, $passwd, $isAdmin)
    {
        $config = config()->get("app.salt_key");
        $pwd = md5($config.$passwd);

        $data = [];
        $data['email'] = $email;
        $data['display_name'] = $displayName;
        $data['passwd'] = $pwd;
        $data['is_admin'] = $isAdmin;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['created_at'] = date('Y-m-d H:i:s');
        $userObj = new AdminUserDao();
        $userObj->insert($data);
        return true;
    }

    /**
     * 更新密码
     *
     * @param $uid
     * @param $passwd
     */
    public function updatePwd($uid, $passwd)
    {
        $config = config()->get("app.salt_key");
        $pwd = md5($config.$passwd);

        $userObj = new AdminUserDao();
        $data = [];
        $data['passwd'] = $pwd;
        $data['updated_at'] = date('Y-m-d H:i:s');

        $where = [];
        $where['id'] = $uid;
        
        $userObj->update($data, $where);
        
        return true;
    }
    
}