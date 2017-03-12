<?php
/**
 * User: Peter Wang
 * Date: 17/2/23
 * Time: 上午10:30
 */

namespace App\Modules\Rpc\Controller\User;


use Trensy\Rpc\Controller;

class IndexController extends Controller
{

    /**
     * 登录
     */
    public function login($user)
    {
        dump(func_get_args());
        $this->response("hello world");
    }

}