<?php
/**
 * User: Peter Wang
 * Date: 17/2/25
 * Time: 上午9:15
 */

namespace App\Glob\Controller\Ppt;


use App\Glob\Service\Ppt\PptService;
use App\Lib\Base\BaseController;
use App\Lib\Dao\Ppt\PptMainDao;
use App\Lib\Dao\Ppt\PptTagMainDao;
use App\Lib\Dao\Ppt\PptTagSubDao;
use App\Lib\Dao\Ppt\PptUserDao;
use App\Lib\Support\File\Upload;
use Trensy\Support\Pagination;

class IndexController extends BaseController
{


    public function index($page)
    {
        $title = trim($this->getRequest()->query->get("title"));
        $this->view->title = $title;
        
        $pageSize  = 20;
        $serviceObj = new PptService();
        $where = [];
        if($title) $where['title'] = ['like', "%".$title."%"];
        $orderBy = "created_at DESC";
        list($list, $totalPage) = $serviceObj->pptList($where, $orderBy, $page, $pageSize);
        $pagi = new Pagination($this->getRequest()->query->all(),$page, $totalPage);
        $this->view->pagi = $pagi->parse();
        $this->view->list = $list;
        $this->view->colors = $serviceObj->getColors();
        $this->display("glob/ppt/index/index");
    }

    /**
     * 添加
     */
    public function add(){

        $obj = new PptService();
        $this->view->tags = $obj->tags(['pid'=>["!=", 0]]);
        $this->view->colors = $obj->getColors();
        $this->view->employee = $obj->getEmployee();
        
        $this->display("glob/ppt/index/add");
    }

    /**
     * 添加服务
     * 
     */
    public function doadd()
    {
        $title = $this->getRequest()->request->get("title");
        $coin = floatval($this->getRequest()->request->get("coin_number"));
        $ppt = $this->getRequest()->files->get("ppt");
        $pptPreview = $this->getRequest()->files->get("ppt_preview");
        $tags = $this->getRequest()->request->get("tags[]");
        $color = (int) $this->getRequest()->request->get("colors");
        $uid = (int) $this->getRequest()->request->get("uid");
        if(!$title) return $this->responseError("标题不能为空");
        if(!$uid) return $this->responseError("创建人不能为空");
        $coin = $coin?$coin:0;
        if(!$ppt) return $this->responseError("PPT文件不能为空");
        if(!$pptPreview) return $this->responseError("PPT预览文件不能为空");
        if(!$tags) return $this->responseError("标签不能为空");
        $endPath = "/ppt/".date('Y')."/".date('m')."/".date('d');
        $path = config()->get("ppt.upload_path").$endPath;

        $fileUp = new Upload();
        $fileUp->setPath($path)->setAllowtype(['pptx', 'ppt'])->setIsrandname(false);
        if(!$fileUp->doUpload($ppt)){
            return $this->responseError($fileUp->getErrorMsg());
        }
        $newPath = $endPath."/".$fileUp->getFileName();

        //预览文件
        $endPathPreview = "/pptpreview/".date('Y')."/".date('m')."/".date('d');
        $pathPreview = config()->get("ppt.upload_path").$endPathPreview;
        $fileUpPreview = new Upload();
        $fileUpPreview->setPath($pathPreview)->setAllowtype(['swf'])->setIsrandname(false);
        if(!$fileUpPreview->doUpload($pptPreview)){
            return $this->responseError($fileUpPreview->getErrorMsg());
        }
        $newPathPreview = $endPathPreview."/".$fileUpPreview->getFileName();

        $obj = new PptMainDao();
        $data = [];
        $data['title'] = $title;
        $data['uid'] = $uid;
        $data['filepath'] = $newPath;
        $data['preview_filepath'] = $newPathPreview;
        $data['coin_number'] = $coin;
        $data['fcolor'] = $color;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $pptId = $obj->insert($data);
        if(!$pptId){
            return $this->responseError("添加ppt失败!");
        }
        $tagObj = new PptTagSubDao();
        $tagMainObj = new PptTagMainDao();

        foreach ($tags as $tag){
            $tagData = [];
            $tagData['tag_id'] = $tag;
            $tagData['ppt_id'] = $pptId;
            $tagData['created_at'] = date('Y-m-d H:i:s');
            $tagData['updated_at'] = date('Y-m-d H:i:s');
            $subTagId = $tagObj->insert($tagData);
            if(!$subTagId){
                return $this->responseError("添加标签到ppt失败!");
            }

            //更新标签ppt数目
            $tagMainObj->inCrease("ppt_number", ['id'=>$tag]);
        }

        $pptuser = new PptUserDao();
        $check = $pptuser->get(['uid'=>$uid]);
        if($check){
            $pptuser->inCrease("product_number", ['uid'=>$uid]);
        }else{
            $userData = [];
            $userData['uid'] = $uid;
            $userData['product_number'] = 1;
            $userData['created_at'] = date('Y-m-d H:i:s');
            $userData['updated_at'] = date('Y-m-d H:i:s');
            $pptuser->insert($userData);
        }

        return $this->responseSuccess("添加成功!", url("glob/ppt@index/index"));
    }

    /**
     * 删除
     *
     * @param $id
     */
    public function del($id)
    {
        $obj = new PptMainDao();
        $info = $obj->get(['id'=>$id]);
        if(!$info) return $this->responseError("数据不存在!", url("glob/ppt@index/index"));
        $pptuser = new PptUserDao();
        $pptuser->deCrement("product_number", ['uid'=>$info['uid']]);
        $tagMainObj = new PptTagMainDao();
        $tagObj = new PptTagSubDao();
        $tagIds = $tagObj->getField("tag_id", ['ppt_id'=>$id], true);

        if($tagIds){
            foreach ($tagIds as $tag){
                $tagMainObj->deCrement("ppt_number", ['id'=>$tag]);
            }
        }
        $obj->delete(['id'=>$id]);
        $tagObj->delete(['ppt_id'=>$id]);

        return $this->responseSuccess("操作成功!", url("glob/ppt@index/index"));
    }

    /**
     * 编辑
     *
     * @param $id
     */
    public function edit($id)
    {
        $obj = new PptService();
        $this->view->tags = $obj->tags(['pid'=>["!=", 0]]);
        $this->view->colors = $obj->getColors();
        $this->view->employee = $obj->getEmployee();
        $obj = new PptMainDao();
        $this->view->info = $obj->get(['id'=>$id]);
        $tagObj = new PptTagSubDao();
        $this->view->subtag = $tagObj->getField("tag_id",['ppt_id'=>$id], true);
        $this->view->id = $id;

        $this->display("glob/ppt/index/edit");
    }


    public function doedit()
    {
        $id = (int) $this->getRequest()->request->get("id");
        $title = $this->getRequest()->request->get("title");
        $coin = floatval($this->getRequest()->request->get("coin_number"));
        $ppt = $this->getRequest()->files->get("ppt");
        $pptPreview = $this->getRequest()->files->get("ppt_preview");
        $tags = $this->getRequest()->request->get("tags[]");
        $color = (int) $this->getRequest()->request->get("colors");
        $uid = (int) $this->getRequest()->request->get("uid");
        if(!$title) return $this->responseError("标题不能为空");
        if(!$uid) return $this->responseError("创建人不能为空");
        $coin = $coin?$coin:0;
        if(!$tags) return $this->responseError("标签不能为空");
        if($ppt) {
            $endPath = "/ppt/" . date('Y') . "/" . date('m') . "/" . date('d');
            $path = config()->get("ppt.upload_path") . $endPath;
            $fileUp = new Upload();
            $fileUp->setPath($path)->setAllowtype(['pptx', 'ppt'])->setIsrandname(false);
            if (!$fileUp->doUpload($ppt)) {
                return $this->responseError($fileUp->getErrorMsg());
            }

            $newPath = $endPath . "/" . $fileUp->getFileName();
        }

        if($pptPreview){
            //预览文件
            $endPathPreview = "/pptpreview/".date('Y')."/".date('m')."/".date('d');
            $pathPreview = config()->get("ppt.upload_path").$endPathPreview;
            $fileUpPreview = new Upload();
            $fileUpPreview->setPath($pathPreview)->setAllowtype(['swf'])->setIsrandname(false);
            if(!$fileUpPreview->doUpload($pptPreview)){
                return $this->responseError($fileUpPreview->getErrorMsg());
            }
            $newPathPreview = $endPathPreview."/".$fileUpPreview->getFileName();
        }

        $obj = new PptMainDao();
        $info = $obj->get(['id'=>$id]);
        $data = [];
        $data['title'] = $title;
        $data['uid'] = $uid;
        if($ppt) $data['filepath'] = $newPath;
        if($pptPreview) $data['preview_filepath'] = $newPathPreview;
        $data['coin_number'] = $coin;
        $data['fcolor'] = $color;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $obj->update($data, ['id'=>$id]);

        //先删后加
        $tagObj = new PptTagSubDao();
        $tagMainObj = new PptTagMainDao();
        $tagIds = $tagObj->getField("tag_id", ['ppt_id'=>$id], true);
        if($tagIds){
            foreach ($tagIds as $tag){
                //减少标签数目
                $tagMainObj->deCrement("ppt_number", ['id'=>$tag]);
            }
        }
        $tagObj->delete(["ppt_id"=>$id]);
        foreach ($tags as $tag){
            $tagData = [];
            $tagData['tag_id'] = $tag;
            $tagData['ppt_id'] = $id;
            $tagData['created_at'] = date('Y-m-d H:i:s');
            $tagData['updated_at'] = date('Y-m-d H:i:s');
            $tagObj->insert($tagData);

            //更新标签ppt数目
            $tagMainObj->inCrease("ppt_number", ['id'=>$tag]);
        }
        //如果创建人更换
        if($info['uid'] != $uid){
            $pptuser = new PptUserDao();
            $pptuser->deCrement("product_number", ['uid'=>$info['uid']]);
            $check = $pptuser->get(['uid'=>$uid]);
            if($check){
                $pptuser->inCrease("product_number", ['uid'=>$uid]);
            }else{
                $userData = [];
                $userData['uid'] = $uid;
                $userData['product_number'] = 1;
                $userData['created_at'] = date('Y-m-d H:i:s');
                $userData['updated_at'] = date('Y-m-d H:i:s');
                $pptuser->insert($userData);
            }
        }
        return $this->responseSuccess("操作成功!", url("glob/ppt@index/index"));
    }

}