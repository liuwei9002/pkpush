<?php
/**
 * 账户相关
 * User: Peter Wang
 * Date: 17/2/3
 * Time: 下午2:06
 */

namespace App\Glob\Controller\Setting;


use App\Glob\Service\Setting\AccountService;
use App\Glob\Service\AccountService as LoginService;
use App\Lib\Base\BaseController;
use App\Lib\Service\ValidateService;

class AccountController extends BaseController
{
    public function whiteActions(){
        return ["adminaccess"=>['editpwd', 'doeditpwd']];
    }
    
    /**
     * 添加
     */
    public function add()
    {
        $this->display("glob/setting/account/add");
    }

    public function doadd()
    {
        $email = $this->request->request->get("email");
        $displayName = $this->request->request->get("displayName");
        $isAdmin = (int) $this->request->request->get("isAdmin");
        $passwd = $this->request->request->get("passwd");

        if(!$email){
            return $this->responseError("邮箱不能为空!");
        }

        if(!ValidateService::emailValidate($email)){
            return $this->responseError("邮箱格式错误!");
        }
        
        if(!$displayName){
            return $this->responseError("昵称不能为空!");
        }

        if(!$passwd){
            return $this->responseError("密码不能为空!");
        }

        $obj = new AccountService();
        $obj->addUser($email, $displayName, $passwd, $isAdmin);
        return $this->responseSuccess("操作成功!", url("glob/setting@account/userlist"));
    }

    /**
     * 用户列表
     */
    public function userlist()
    {
        $obj = new AccountService();
        $this->view->list = $obj->getAllUser();
        
        $this->display("glob/setting/account/list");
    }

    /**
     * 删除用户
     *
     * @param $id
     */
    public function deluser($id)
    {
        $obj = new AccountService();
        $obj->delUser($id);
        $this->response->redirect(url('glob/setting@account/userlist'));
    }

    /**
     * 修改密码
     *
     * @param $id
     */
    public function editpwd()
    {
        $this->display('glob/setting/account/editpwd');
    }

    /**
     * 修改密码后台
     *
     * @param $id
     */
    public function doeditpwd()
    {
        $pwd = $this->request->request->get("pwd");
        $pwd1 = $this->request->request->get("pwd1");
        $pwd2 = $this->request->request->get("pwd2");

        if(!$pwd){
            return $this->responseError("原密码不能为空!");
        }

        if(!$pwd1){
            return $this->responseError("新密码不能为空!");
        }

        if($pwd1 != $pwd2){
            return $this->responseError("两次密码不相等!");
        }

        $obj = new LoginService();
        $user = $obj->getLogin();

        if(!$obj->checkPwd($user['id'], $pwd)){
            return $this->responseError("原密码错误!");
        }

        $obj->updatePwd($user['id'], $pwd1);

        return $this->responseSuccess("操作成功!", url("glob/index/index"));
    }
}