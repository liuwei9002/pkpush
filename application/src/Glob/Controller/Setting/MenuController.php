<?php
/**
 * User: Peter Wang
 * Date: 16/12/26
 * Time: 下午1:55
 */

namespace App\Glob\Controller\Setting;


use App\Glob\Service\Setting\AccessService;
use App\Glob\Service\Setting\MenuService;
use App\Lib\Base\BaseController;

class MenuController extends BaseController
{

    public function index()
    {
        $objMenu = new MenuService();
        $this->view->pmenu = $objMenu->getAll("", 3);
        $this->display("glob/setting/menu/index");
    }

    public function add()
    {
        $objMenu = new MenuService();
        $this->view->pmenu = $objMenu->getRoot();

        $obj = new AccessService();
        $this->view->accesslist = $obj->getAccess();

        $this->display("glob/setting/menu/add");
    }

    public function doadd()
    {
        $pid = (int)$this->request->request->get("pid");
        $name = $this->request->request->get("name");
        $accessid = (int)$this->request->request->get("access_id");
        $fsort = (int)$this->request->request->get("fsort");
        $icon = $this->request->request->get("icon");
        $fstatus = (int)$this->request->request->get("fstatus");

        if (!$name) {
            return $this->responseError("名称不能为空!");
        }

        if (!$accessid) {
            return $this->responseError("请选择一种权限!");
        }


        $obj = new MenuService();
        $id = $obj->add($pid, $name, $accessid, $fsort, $icon, $fstatus);
        if ($id) {
            return $this->responseSuccess("添加成功!", url("glob/setting@menu/index"));
        } else {
            return $this->responseError("添加失败请重试!");
        }
    }

    public function updatestatus($id, $status)
    {
        $id = (int)$id;
        $obj = new MenuService();
        $data = [];
        $data['fstatus'] = $status ? 0 : 1;
        $obj->updateById($id, $data);
        $this->response->redirect(url("glob/setting@menu/index"));
    }

    public function del($id)
    {
        $id = (int)$id;
        $obj = new MenuService();
        $obj->delById($id);
        $this->response->redirect(url("glob/setting@menu/index"));
    }

    public function edit($id)
    {
        $id = (int)$id;
        $obj = new MenuService();
        $this->view->info = $obj->getById($id);

        $objMenu = new MenuService();
        $this->view->pmenu = $objMenu->getRoot();

        $obj = new AccessService();
        $this->view->accesslist = $obj->getAccess();

        $this->display("glob/setting/menu/edit");
    }
    
    public function doedit($id)
    {
        $id = (int) $id;
        $pid = (int) $this->request->request->get("pid");
        $name = $this->request->request->get("name");
        $accessid = (int) $this->request->request->get("access_id");
        $fsort = (int) $this->request->request->get("fsort");
        $icon = $this->request->request->get("icon");
        $fstatus = (int) $this->request->request->get("fstatus");
        if (!$name) {
            return $this->responseError("名称不能为空!");
        }

        if (!$accessid) {
            return $this->responseError("请选择一种权限!");
        }

        $obj = new MenuService();
        $data = [];
        $data['pid'] = $pid;
        $data['name'] = $name;
        $data['access_id'] = $accessid;
        $data['fsort'] = $fsort;
        $data['icon'] = $icon;
        $data['fstatus'] = $fstatus;
        $obj->updateById($id, $data);
        return $this->responseSuccess("操作成功!", url("glob/setting@menu/index"));
    }
}