<?php
/**
 * 账户相关
 * User: Peter Wang
 * Date: 17/2/3
 * Time: 下午2:06
 */

namespace App\Glob\Controller;


use App\Glob\Service\AccountService;
use App\Lib\Base\BaseController;
use App\Lib\Service\CaptchaService;
use App\Lib\Service\ValidateService;

class AccountController extends BaseController
{
    public function whiteActions(){
        return ["*"=>['login', 'logout']];
    }

    /**
     * 登录
     */
    public function login(){
        $check = $this->request->isMethod('post');
        if($check){
            $email = $this->request->request->get("email");
            $pwd = $this->request->request->get("pwd");
            $captcha = $this->request->request->get("captcha");

            if(!$email){
                return $this->responseError("邮箱不能为空!");
            }
            
            if(!ValidateService::emailValidate($email)){
                return $this->responseError("邮箱格式错误!");
            }

            if(!$pwd){
                return $this->responseError("密码不能为空!");
            }

            if(!$captcha){
                return $this->responseError("验证码不能为空!");
            }

            $obj = new CaptchaService();
            if(!$obj->check($captcha, "login")){
                return $this->responseError("验证码错误!");
            }

            $accountObj = new AccountService();
            if(!$accountObj->login($email, $pwd)){
                return $this->responseError("邮箱或者密码错误!");
            }

            $obj->clear("login");

            return $this->responseSuccess("登录成功!", url("glob/index/index"));
        }
        $this->display("glob/account/login");
    }

    /**
     * 退出
     */
    public function logout()
    {
        $accountObj = new AccountService();
        $accountObj->logout();

        $this->response->cookie("menu_active", '', -1, "/");

        $this->response->redirect(url('glob/account/login'));
    }
}