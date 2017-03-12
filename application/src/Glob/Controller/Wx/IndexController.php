<?php
/**
 * User: Peter Wang
 * Date: 17/2/9
 * Time: 下午3:02
 */

namespace App\Glob\Controller\Wx;


use App\Glob\Service\Wx\WxMenuService;
use App\Glob\Service\Wx\WxService;
use App\Lib\Base\BaseController;
use App\Lib\Dao\Wx\WxpubMenuDao;

class IndexController extends BaseController
{


    /**
     * 公众号列表
     */
    public function index()
    {
        $config = config()->get("app.wx");
        $this->view->publickey = array_keys($config);
        $this->display("glob/wx/index/index");
    }

    /**
     * 自定义菜单列表
     */
    public function menulist($appName)
    {
        $this->view->appName = $appName;
        
        $obj = new WxMenuService();
        $this->view->list = $obj->getAll();

        $this->display("glob/wx/index/menulist");
    }

    /**
     * 添加根菜单
     */
    public function add($appName, $pid)
    {
        $this->view->appName = $appName;
        $this->view->pid = $pid;

        $this->display("glob/wx/index/add");
    }

    /**
     * 处理根菜单
     * @param $appName
     */
    public function doadd($appName, $pid)
    {
        $fname = $this->getRequest()->request->get("fname");

        if(!$fname){
            return $this->responseError("菜单名称不能为空!");
        }

        if(!$pid  && mb_strlen($fname) > 4){
            return $this->responseError("菜单名称不能超过4个汉字!");
        }

        if($pid  && mb_strlen($fname) > 7){
            return $this->responseError("菜单名称不能超过7个汉字!");
        }

        $all = $this->getRequest()->request->all();
        if($pid) $all['pid'] = $pid;
        
        $obj = new WxpubMenuDao();
        $obj->autoAdd($all);

        return $this->responseSuccess("添加成功", url('glob/wx@index/menulist', ['appName'=>$appName]));
    }

    /**
     * 添加根菜单
     */
    public function edit($appName, $id)
    {
        $this->view->appName = $appName;
        $this->view->id = $id;

        $obj = new WxMenuService();
        $this->view->info = $obj->getById($id);
        
        $this->display("glob/wx/index/edit");
    }

    /**
     * 处理根菜单
     * @param $appName
     */
    public function doedit($appName, $id)
    {
        $fname = $this->getRequest()->request->get("fname");

        if(!$fname){
            return $this->responseError("菜单名称不能为空!");
        }

        $obj = new WxMenuService();
        $info = $obj->getById($id);
        $pid = $info['pid'];
        
        if(!$pid  && mb_strlen($fname) > 4){
            return $this->responseError("菜单名称不能超过4个汉字!");
        }

        if($pid  && mb_strlen($fname) > 7){
            return $this->responseError("菜单名称不能超过7个汉字!");
        }

        $all = $this->getRequest()->request->all();

        $where = [];
        $where['id'] = $id;

        $obj = new WxpubMenuDao();
        $obj->autoUpdate($all, $where);
        
        return $this->responseSuccess("编辑成功", url('glob/wx@index/menulist', ['appName'=>$appName]));
    }


    public function delete($appName, $id){
        $obj = new WxMenuService();
        $info = $obj->getById($id);
        if(!$info) $this->getResponse()->redirect(url('glob/wx@index/menulist', ['appName'=>$appName]));
        $obj = new WxpubMenuDao();
        if($info['pid']==0){
            $obj->delete(['pid'=>$id]);
        }
        $obj->delete(['id'=>$id]);
        $this->getResponse()->redirect(url('glob/wx@index/menulist', ['appName'=>$appName]));
    }

    /**
     * 上报到微信
     *
     * @param $appName
     */
    public function upwx($appName){
        $obj = new WxMenuService();
        $list = $obj->getAll(1);

        $result = [];
        if($list){
            foreach ($list as $k=>$v){
                $tmp = [];
                $tmp['name'] = $v['fname'];
                if(isset($v['child']) && $v['child']){
                    $child = $v['child'];
                    $childTmp = [];
                    foreach ($child as $cv){
                        $childArr = [];
                        $childArr['name'] = $cv['fname'];
                        $childArr['type'] = $cv['ftype'];
                        if($cv['ftype']  == 'view'){
                            $childArr['url'] = $cv['fdata'];
                        }else if($cv['ftype']  == 'click'){
                            $childArr['key'] = $cv['fdata'];
                        }
                        $childTmp[] = $childArr;
                    }
                    $tmp['sub_button'] = $childTmp;
                }else{
                    $tmp['type'] = $v['ftype'];
                    if($v['ftype']  == 'view'){
                        $tmp['url'] = $v['fdata'];
                    }else if($v['ftype']  == 'click'){
                        $tmp['key'] = $v['fdata'];
                    }
                }
                $result[] = $tmp;
            }
        }

        $serviceObj = new WxService();
        $api = $serviceObj->getApi($appName, $this->request, $this->response);
        $sendData = [];
        $sendData['button'] = $result;

        $rs = $api->create_menu(json_encode($sendData, JSON_UNESCAPED_UNICODE));
        list($startstatus, $endStatus) = $rs;
        if($startstatus){
            return $this->responseError($startstatus->errcode.":".$startstatus->errmsg);
        }else{
            return $this->responseSuccess("上报成功");
        }
    }



}