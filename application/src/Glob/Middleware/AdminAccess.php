<?php
/**
 * 权限检查
 * Date: 16/12/19
 * Time: 下午4:30
 */

namespace App\Glob\Middleware;


use App\Glob\Service\AccountService;
use App\Lib\Base\BaseController;
use Trensy\Mvc\Route\RouteMatch;
use Trensy\Support\Flash;

class AdminAccess
{

    public function perform($request, $response)
    {
        $objUser = new AccountService();
        $login = $objUser->getLogin();
        if($login){
            $uid = $login['id'];
            $check = $this->checkRight($uid);
            if(!$check){
                if($request->isXmlHttpRequest()){
                    $controllerObj = new BaseController($request, $response);
                    $controllerObj->responseError("你没有权限进行此操作!", url('glob/index/index'));
                    return false;
                }else{
                    Flash::error("你没有权限进行此操作!");
                    $response->redirect(url("glob/index/index"));
                }
            }
            return true;
        }
        return false;
    }

    protected function checkRight($uid)
    {
        $match = RouteMatch::getDispatch();
        if(isset($match['routeName']) && $match['routeName']){
            $routeName = $match['routeName'];
            $obj = new AccountService();
            return $obj->checkAccess($uid, $routeName);
        }
        return true;
    }

}