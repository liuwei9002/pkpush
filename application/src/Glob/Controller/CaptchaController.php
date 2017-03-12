<?php
/**
 * User: Peter Wang
 * Date: 17/2/4
 * Time: 下午3:53
 */

namespace App\Glob\Controller;


use App\Lib\Base\BaseController;
use App\Lib\Service\CaptchaService;

class CaptchaController extends BaseController
{
    public function whiteActions(){
        return ['recaptcha', 'checkcaptcha'];
    }

    /**
     * 图形验证码
     */
    public function recaptcha($type='')
    {
        $obj = new CaptchaService();
        list($source, $header) = $obj->get($type);

        if($header){
            foreach ($header as $v){
                $this->response->headerStr($v);
            }
        }
        $this->response->end($source);
    }

    /**
     * 检查图形验证码
     */
    public function checkcaptcha($type='')
    {
        $vl = $this->request->request->get("vl");
        if(!$vl) return $this->response([],self::RESPONSE_NORMAL_ERROR_CODE);
        $obj = new CaptchaService();
        $check = $obj->check($vl, $type);
        if(!$check) $this->response([],self::RESPONSE_NORMAL_ERROR_CODE);
        return $this->response();
    }
}