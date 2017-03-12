<?php
/**
 * 登录检查
 *
 * User: Peter Wang
 * Date: 17/2/3
 * Time: 下午2:09
 */

namespace App\Glob\Middleware;


use App\Glob\Service\AccountService;
use App\Lib\Base\BaseController;
use Trensy\Http\Request;
use Trensy\Http\Response;

class Authorize
{
    const RESPONSE_USER_ERROR_CODE = 900;

    public function perform(Request $request, Response $reponse)
    {
     
        $obj = new AccountService();
        $check = $obj->getLogin();
        
        if(!$check){
            if($request->isXmlHttpRequest()){
                $controllerObj = new BaseController($request, $reponse);
                $controllerObj->responseError("抱歉,请先登录!", url('glob/account/login'));
                return false;
            }else{
                $reponse->redirect(url('glob/account/login'));
            }
        }
        return true;
    }
}