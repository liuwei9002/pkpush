<?php
/**
 * User: Peter Wang
 * Date: 17/2/23
 * Time: 上午10:41
 */

namespace App\Modules\Rpc\Service;


use App\Lib\Dao\User\UsersDao;
use App\Lib\Dao\User\UsersLoginDao;
use App\Lib\Support\Valid;
use Trensy\Support\Tool;

class AccountService
{

    public function checkAccount($account)
    {
        $userDao = new UsersDao();
        return $userDao->get(['account'=>$account]);
    }

    public function checkDisplayName($account)
    {
        $userDao = new UsersDao();
        return $userDao->get(['display_name'=>$account]);
    }

    public function login($account, $passwd, $params)
    {
        $ip = array_isset($params, "ip");
        $source = array_isset($params, "source");
        $config = config()->get("app.salt_key");
        $passwd = md5($config.$passwd);

        $userDao = new UsersDao();
        $where = [];
        $where['account'] = $account;
        $where['passwd'] = $passwd;

        $user = $userDao->get($where);
        if(!$user) return false;
        unset($user['passwd']);
        $token = Tool::guuid();
        $data = [];
        $data['uid'] =$user['id'];
        $data['login_ip'] = $ip;
        $data['login_source'] = $source;
        $data['login_token'] = $token;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $userLoginDao = new UsersLoginDao();
        $userLoginDao->insert($data);

        $user['token'] = $token;
        return $user;
    }


    public function register($account, $passwd, $displayName, $validate, $regSource, $regIp)
    {
        $userDao = new UsersDao();
        $data = [];
        $data['account'] = $account;
        $data['account_type'] = $this->accountType($account);
        $data['display_name'] = $displayName;
        $data['passwd'] = $passwd;
        $data['validate'] = $validate;
        $data['is_lock'] = 0;
        $data['reg_source'] = $regSource;
        $data['reg_ip'] = $regIp;
        $data['is_employee'] = 0;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $userDao->insert($data);
    }

    /**
     * @param $account
     * @return int 账户类型 1-email 2-用户名 3-手机号码
     */
    public function accountType($account)
    {
        if(Valid::isMobile($account)) return 3;
        if(Valid::isEmail($account)) return 1;
        return 2;
    }


}