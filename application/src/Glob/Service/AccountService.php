<?php
/**
 * User: Peter Wang
 * Date: 17/2/4
 * Time: 下午5:21
 */

namespace App\Glob\Service;


use App\Lib\Dao\Setting\AccessGroupAccessDao;
use App\Lib\Dao\Setting\AccessGroupUserDao;
use App\Lib\Dao\Setting\AdminAccessDao;
use App\Lib\Dao\Setting\AdminUserDao;

class AccountService
{
    const LOGIN_ADMIN_KEY = "LOGIN_ADMIN_KEY";
    /**
     * 登录
     * @param $email
     * @param $pwd
     * @return bool
     */
    public function login($email, $pwd)
    {
        $config = config()->get("app.salt_key");
        $pwd = md5($config.$pwd);
        
        $obj = new AdminUserDao();
        $where = [];
        $where['email'] = $email;
        $where['passwd'] = $pwd;
        $user = $obj->get($where);
        if($user){
            session()->clear();
            session()->set(self::LOGIN_ADMIN_KEY, $user);
            return true;
        }
        return false;
    }

    public function checkPwd($uid, $pwd)
    {
        $config = config()->get("app.salt_key");
        $pwd = md5($config.$pwd);

        $obj = new AdminUserDao();
        $where = [];
        $where['id'] = $uid;
        $where['passwd'] = $pwd;
        $user = $obj->get($where);
        if($user){
            return true;
        }
        return false;
    }

    /**
     * 是否登录
     * @return mixed
     */
    public function getLogin(){
        return session()->get(self::LOGIN_ADMIN_KEY);
    }

    /**
     * 退出
     */
    public function logout()
    {
        session()->del(self::LOGIN_ADMIN_KEY);
    }


    /**
     * 检查权限
     * @param $routeName
     */
    public function checkAccess($uid, $routeName)
    {

        $routes = session()->get("user_routes");
        if(!$routes){
            $userObj = new AdminUserDao();
            $user = $userObj->get(['id'=>$uid]);
            if(!$user) return false;
            $where = [];
            if(!$user['is_admin']){
                $where['uid'] = $uid;
                $accessGUser = new AccessGroupUserDao();
                $accessGroupIds = $accessGUser->getField("access_group_id", $where, true);
                if(!$accessGroupIds) return false;
                $accesObj = new AccessGroupAccessDao();
                $accesIds = $accesObj->getField("access_id", ["access_group_id"=>["in", $accessGroupIds]], true);
                if(!$accesIds) return false;
                $routeObj = new AdminAccessDao();
                $routes = $routeObj->getField("route", ["id"=>["in", $accesIds]], true);
                if(!$routes) return false;
                session()->set("user_routes", $routes);
            }else{
                $routeObj = new AdminAccessDao();
                $routes = $routeObj->getField("route", [], true);
                session()->set("user_routes", $routes);
            }
        }
        return in_array($routeName, $routes);
    }
    
}