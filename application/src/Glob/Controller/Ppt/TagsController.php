<?php
/**
 * User: Peter Wang
 * Date: 17/2/28
 * Time: 上午11:13
 */

namespace App\Glob\Controller\Ppt;


use App\Glob\Service\Ppt\PptService;
use App\Lib\Base\BaseController;
use App\Lib\Dao\Ppt\PptTagMainDao;

class TagsController extends BaseController
{

    /**
     * tag 列表
     */
    public function index()
    {
        $serviceObj = new PptService();
        $list= $serviceObj->tagsList();
        $this->view->list = $list;
        $this->display("glob/ppt/tags/index");
    }

    /**
     * tag添加
     */
    public function add()
    {
        $obj = new PptTagMainDao();
        $this->view->tags = $obj->gets(['pid'=>0], "fsort ASC, created_at DESC");

        $this->display("glob/ppt/tags/add");
    }

    /**
     * tag 添加
     */
    public function doadd()
    {
        $name = trim($this->getRequest()->request->get("name"));
        $pid = (int) $this->getRequest()->request->get("pid");
        $fsort = (int) $this->getRequest()->request->get("fsort");

        if(!$name){
            return $this->responseError("名称不能为空!");
        }

        $obj = new PptTagMainDao();
        $data = [];
        $data['name'] = $name;
        $data['pid'] = $pid;
        $data['fsort'] = $fsort;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $obj->insert($data);

        return $this->responseSuccess("操作成功!", url("glob/ppt@tags/index"));
    }

    public function edit($id)
    {
        $obj = new PptTagMainDao();
        $this->view->info = $obj->get(['id'=>$id]);

        $obj = new PptTagMainDao();
        $this->view->tags = $obj->gets(['pid'=>0], "fsort ASC, created_at DESC");

        $this->view->id = $id;

        $this->display("glob/ppt/tags/edit");
    }


    public function doedit()
    {
        $name = trim($this->getRequest()->request->get("name"));
        $pid = (int) $this->getRequest()->request->get("pid");
        $fsort = (int) $this->getRequest()->request->get("fsort");
        $id = (int) $this->getRequest()->request->get("id");

        if(!$name){
            return $this->responseError("名称不能为空!");
        }

        $obj = new PptTagMainDao();
        $data = [];
        $data['name'] = $name;
        $data['pid'] = $pid;
        $data['fsort'] = $fsort;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $obj->update($data, ['id'=>$id]);

        return $this->responseSuccess("操作成功!", url("glob/ppt@tags/index"));
    }


    public function del($id)
    {
        $obj = new PptTagMainDao();
        $obj->delete(['pid'=>$id]);
        $obj->delete(['id'=>$id]);
        return $this->responseSuccess("操作成功!", url("glob/ppt@tags/index"));
    }

}
