<?php
namespace App\Glob\Controller\Setting;

use App\Glob\Service\Setting\AccessgroupService;
use App\Lib\Base\BaseController;
use App\Glob\Service\Setting\AccessService;

class AccessgroupController extends BaseController
{

    public function index()
    {
        $obj = new AccessgroupService();
        $this->view->list = $obj->getList();
        $this->display("glob/setting/access_group/index");
    }

    public function add()
    {
        $obj = new AccessService();
        $this->view->list = $obj->getAccess();
        $this->display("glob/setting/access_group/add");
    }

    public function doadd()
    {
        $name = $this->request->request->get("name");
        $perm = $this->request->request->get("perm");
        $descr = $this->request->request->get("descr");

        if(!$name){
            return $this->responseError("权限组名称不能为空!");
        }

        if(!$perm){
            return $this->responseError("权限必须选择!");
        }
        
        $obj = new AccessgroupService();
        $rs = $obj->insert($name, $perm, $descr);
        if(!$rs){
            return $this->responseError("添加失败!");
        }else{
            return $this->responseSuccess("添加成功!", url("glob/setting@accessgroup/index"));
        }
    }

    public function edit($id)
    {
        $id = (int) $id;
        $obj = new AccessgroupService();
        $this->view->info = $obj->getById($id);
        if(!$this->view->info){
            return $this->responseError("数据不存在!");
        }
        $obj = new AccessService();
        $this->view->list = $obj->getAccess();
        $this->display("glob/setting/access_group/edit");
    }

    public function doedit($id)
    {
        $name = $this->request->request->get("name");
        $perm = $this->request->request->get("perm");
        $descr = $this->request->request->get("descr");

        if(!$name){
            return $this->responseError("权限组名称不能为空!");
        }

        if(!$perm){
            return $this->responseError("权限必须选择!");
        }

        $obj = new AccessgroupService();
        $rs = $obj->edit($id, $name, $perm, $descr);
        if(!$rs){
            return $this->responseError("操作失败!");
        }else{
            return $this->responseSuccess("操作成功!", url("glob/setting@accessgroup/index"));
        }
    }

    public function del($id)
    {
        $obj = new AccessgroupService();
        $obj->del($id);
        $this->response->redirect(url("glob/setting@accessgroup/index"));
    }

    public function addUser($id)
    {
        $id = (int) $id;
        $this->view->id = $id;
        
        $obj = new AccessgroupService();
        $this->view->info = $obj->getById($id);
        
        $obj = new AccessgroupService();

        list($list, $other) = $obj->getGroupUser($id);
        $this->view->list = $list;

        $u = [];
        if($other){
            foreach ($other as $v){
                $isAdd = isset($v['is_add'])?"✅":"";
                $u[] = ["id"=>$v['id'],"tag"=>$v['tag'], "is_add"=>$isAdd];
            }
        }
       
        $this->view->users = json_encode($u);

        $this->display("glob/setting/access_group/adduser");
    }

    public function deluser($id, $uid)
    {
        $id = (int) $id;
        $uid = (int) $uid;
        
        $obj = new AccessgroupService();
        $obj->delGroupUser($uid, $id);
        $this->response->redirect(url("core/setting@accessgroup/addUser",['id'=>$id]));
    }

    public function doadduser($id)
    {
        $id = (int) $id;
        $users = $this->request->request->get("users");
        $obj = new AccessgroupService();
        $obj->addGroupUser($users, $id);
        return $this->responseSuccess("添加成功!");
    }

}