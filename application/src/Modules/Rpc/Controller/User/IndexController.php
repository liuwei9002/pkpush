<?php
/**
 * User: Peter Wang
 * Date: 17/2/23
 * Time: 上午10:30
 */

namespace App\Modules\Rpc\Controller\User;


use App\Lib\Support\Valid;
use App\Modules\Rpc\Service\AccountService;
use Trensy\Rpc\Controller;

class IndexController extends Controller
{

    /**
     * @api /api/front/login 用户登录
     * @apiVersion 1.0.0
     * @apiName 用户登录
     * @apiGroup 账户相关
     *
     * @apiStruct params string ip 登录的前端ip地址
     *            params string source 登录的来源, 比如ppt-web,ppt-weixin
     * @apiParam string account 用户名
     * @apiParam string passwd 密码
     * @apiParam params params 其他数据
     *
     * @apiStruct   userinfo string account 账户
     *              userinfo string display_name 昵称
     *              userinfo int validate 账号是否验证
     *              userinfo int account_type 账号类型
     *              userinfo int 	is_lock 账号是否被锁定
     *              userinfo int is_employee 是否员工账号
     *
     * @apiSuccess int statusCode=200
     * @apiSuccess userinfo result
     * @apiSuccess float elapsedTime 执行时间
     *
     */
    public function login()
    {
        $account = trim($this->getParam("account"));
        $passwd = trim($this->getParam("passwd"));
        $params = $this->getParam("params");

        if(!$account) return $this->responseError("登录账户不能为空!");
        if(!$passwd) return $this->responseError("密码不能为空!");

        $obj = new AccountService();
        $userInfo = $obj->login($account, $passwd, $params);
        if($userInfo){
            return $this->responseSuccess($userInfo);
        }else{
            return $this->responseError("用户名或者密码错误");
        }
    }


    /**
     * 注册接口
     *
     *  /api/front/register
     *
     *  params: account string 账户
     *          passwd string 密码
     *          display_name string 呢称
     *          reg_source string 注册来源, ppt-pc
     *          reg_ip string 注册ip
     *          validate int 是否已认证
     * 成功返回用户 uid
     *
     */
    public function register()
    {
        $account = trim($this->getParam("account"));
        $passwd = trim($this->getParam("passwd"));
        $displayName = trim($this->getParam("display_name"));
        $regSource = trim($this->getParam("reg_source"));
        $regIp = trim($this->getParam("reg_ip"));
        $validate = (int) $this->getParam("validate");

        if(!$account) return $this->responseError("登录账号不能为空!");
        if(!$passwd) return $this->responseError("密码不能为空!");
        if(!$displayName) return $this->responseError("昵称不能为空!");
        if(!$regSource) return $this->responseError("注册来源不能为空!");
        if(!$regIp) return $this->responseError("注册IP不能为空!");

        if(!Valid::isMobile($account) && !Valid::isEmail($account) && !Valid::isAccount($account)){
            return $this->responseError("账号格式不合法!");
        }

        $obj = new AccountService();
        $uid = $obj->register($account, $passwd, $displayName, $validate, $regSource, $regIp);
        if($uid){
            return $this->responseSuccess($uid);
        }else{
            return $this->responseError("未知错误,注册失败");
        }
    }

    /**
     *  /api/front/validRegister
     *
     *  params: account string 账号 非必填
     *          display_name string 昵称 非必填
     */
    public function validRegister(){
        $account = trim($this->getParam("account"));
        $displayName = trim($this->getParam("display_name"));
        
        $obj = new AccountService();
        if($account){
            if(!$obj->checkAccount($account)) return $this->responseError("账号已存在!");
        }

        if($displayName){
            if(!Valid::isDisplayName($displayName)) return $this->responseError("呢称必须是2-12个由字母,数字,下划线,中文组成的字符串!");
            if(!$obj->checkDisplayName($displayName)) return $this->responseError("呢称已存在!");
        }

        if(!$account && !$displayName){
            return $this->responseError("参数为空!");
        }

        return $this->responseSuccess('');
    }

}