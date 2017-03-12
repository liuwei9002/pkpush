<?php
/**
 * User: Peter Wang
 * Date: 16/12/26
 * Time: 下午2:20
 */

namespace App\Glob\Middleware;


use App\Glob\Service\Setting\MenuService;
use App\Glob\Service\AccountService;
use Trensy\Http\Request;
use Trensy\Http\Response;

class AdminGlob
{

    public function perform(Request $request, Response $response)
    {
        $active = $request->cookies->get("menu_active");
        
        $objHelper = new MenuService();
        $menu = $objHelper->getAll($active);
//        dump($menu);
        $response->view->menu = $menu;
        $response->view->homeactive = $active?"":"active";

        $objUser = new AccountService();
        $login = $objUser->getLogin();
        $response->view->objUser = $objUser;
        $response->view->userinfo = $login;

        return true;
    }
}