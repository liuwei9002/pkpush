<?php
/**
 * User: Peter Wang
 * Date: 17/2/23
 * Time: 上午10:45
 */

namespace App\Glob\Service\User;


use App\Lib\Dao\User\UsersDao;

class UserService
{

    /**
     * 用户列表
     *
     * @param $where
     * @param $orderBy
     * @param $page
     * @param $pageSize
     */
    public function userList($where, $orderBy, $page, $pageSize)
    {
        $obj = new UsersDao();
        $data = $obj->pager($where, $page, $pageSize, $orderBy);
        return $data;
    }

    /**
     * 获取用户信息
     *
     * @param $uid
     * @return mixed
     */
    public function getUserInfo($uid)
    {
        $obj = new UsersDao();
        return $obj->get(['id' => $uid]);
    }

    /**
     * @param $data
     * @param $where
     */
    public function updateUserInfo($data, $where)
    {
        $obj = new UsersDao();
        return $obj->update($data, $where);
    }
}