<?php
/**
 * User: Peter Wang
 * Date: 17/3/16
 * Time: 上午11:22
 */

namespace App\Modules\Rpc\Controller\Admin\User;


use App\Glob\Service\AccountService;
use App\Lib\Dao\Setting\AdminUserDao;
use Trensy\Rpc\Controller;

class IndexController extends Controller
{

    /**
     *  /api/admin/login
     *
     *    参数   account, passwd
     */
    public function login()
    {
        $email = trim($this->getParam("account"));
        $passwd = $this->getParam("passwd");

        if(!$email){
            return $this->responseError("邮箱不能为空!");
        }

        if(!$passwd){
            return $this->responseError("密码不能为空!");
        }

        $accountObj = new AccountService();
        $user  = $accountObj->login($email, $passwd, 0);
        if(!$user) {
            return $this->responseError("邮箱或者密码错误!");
        }

        return $this->responseSuccess($user);
    }


    /**
     * /api/admin/getUserById
     *
     *  参数 uid
     */
    public function getUserById()
    {
        $uid = intval($this->getParam("uid"));

        $obj = new AdminUserDao();
        $user = $obj->get(['id'=>$uid]);
        if(!$user) return $this->responseSuccess([]);
        unset($user['passwd']);
        return $this->responseSuccess($user);
    }

    /**
     *  /api/admin/getAllUser
     *
     */
    public function getAllUser()
    {
        $obj = new AdminUserDao();
        $user = $obj->gets();
        if($user){
            foreach ($user as &$v){
                unset($v['passwd']);
            }
        }
        return $this->responseSuccess($user);
    }

}