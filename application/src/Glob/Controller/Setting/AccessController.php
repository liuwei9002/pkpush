<?php
/**
 * User: Peter Wang
 * Date: 17/1/4
 * Time: 下午1:44
 */

namespace App\Glob\Controller\Setting;


use App\Glob\Service\Setting\AccessService;
use App\Lib\Base\BaseController;

class AccessController extends BaseController
{

    public function index()
    {
        $obj = new AccessService();
        $this->view->list = $obj->getAccess();
        $this->display("glob/setting/access/index");
    }

    public function add()
    {
        $this->display("glob/setting/access/add");
    }

    public function doadd()
    {
        $name = $this->request->request->get("name");
        $route = $this->request->request->get("route");
        $ptype = (int) $this->request->request->get("ptype");
        $isRoot = (int) $this->request->request->get("is_root");

        if(!$name){
            return $this->responseError("权限名称不能为空!");
        }

        $obj = new AccessService();
        $id = $obj->add($name, $route, $ptype, $isRoot);
        if($id){
            return $this->responseSuccess("添加成功!", url("glob/setting@access/index"));
        }else{
            return $this->responseError("添加失败请重试!");
        }
    }

    /**
     * 删除
     * @param $id
     */
    public function delete($id)
    {
        $id = (int) $id;
        $obj = new AccessService();
        $obj->delById($id);
        $this->response->redirect(url("glob/setting@access/index"));
    }

    public function edit($id)
    {
        $id = (int) $id;
        $obj = new AccessService();
        $this->view->info = $obj->get($id);
        $this->display("glob/setting/access/edit");
    }


    public function doedit($id)
    {
        $id = (int) $id;

        $name = $this->request->request->get("name");
        $route = $this->request->request->get("route");
        $ptype = (int) $this->request->request->get("ptype");
        $isRoot = (int) $this->request->request->get("is_root");

        if(!$name){
            return $this->responseError("权限名称不能为空!");
        }

        $obj = new AccessService();
        $obj->editById($id, $name, $route, $ptype, $isRoot);
        return $this->responseSuccess("操作成功!", url("glob/setting@access/index"));
    }
}