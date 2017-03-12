<?php

/**
 * User: Peter Wang
 * Date: 16/9/13
 * Time: 下午3:18
 */
namespace App\Glob\Controller;

use App\Lib\Base\BaseController;

class IndexController extends BaseController
{

    public function whiteActions(){
        return ["adminaccess"=>['index']];
    }

    public function index()
    {
        $this->getResponse()->cookie("menu_active", '', -1, "/");

        $this->display("glob/index/index");
    }

}