<?php
/**
* 会员管理
**/
namespace App\Glob\Controller\User;

use App\Glob\Service\User\UserService;
use App\Lib\Base\BaseController;
use Trensy\Support\Pagination;

class IndexController extends BaseController{

    /**
     * 会员列表
     */
    public function index($page){
        $account = $this->getRequest()->query->get("account");
        $this->view->account = $account;
        
        $pageSize  = 20;
        $serviceObj = new UserService();
        $where = [];
        if($account) $where['account'] = ["like", "%".$account."%"];
        $orderBy = "created_at DESC";
        list($list, $count, $totalPage) = $serviceObj->userList($where, $orderBy, $page, $pageSize);
        $pagi = new Pagination($this->getRequest()->query->all(),$page, $totalPage);
        $this->view->pagi = $pagi->parse();
        $this->view->list = $list;
        $this->display("glob/user/index/index");
    }

    /**
     * 加锁或者解锁
     */
    public function lock($uid)
    {
        $serviceObj = new UserService();
        $userinfo = $serviceObj->getUserInfo($uid);
        if(!$userinfo) return $this->responseError("会员不存在");
        $isLock = $userinfo['is_lock']?0:1;
        $data = [];
        $data['is_lock'] = $isLock;
        $where = [];
        $where['id'] = $uid;
        $serviceObj->updateUserInfo($data, $where);
        return $this->responseSuccess("操作成功!", url("glob/user@index/index"));
    }
    
}