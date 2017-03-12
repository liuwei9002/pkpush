<?php
/**
 * 微信公众号
 *
 * User: Peter Wang
 * Date: 17/2/8
 * Time: 下午2:13
 */

namespace App\Modules\Wx\Controller;


use App\Glob\Service\Wx\WxService;
use App\Lib\Base\BaseController;

class WxController extends BaseController
{

    public function index($appName)
    {
        // 获取微信消息
        $wechat = WxService::getWeChat($appName, $this->getRequest(), $this->getResponse());
        $msg = $wechat->serve();
        // 回复微信消息
        ob_start();
        if ($msg->MsgType == 'text' && $msg->Content == '你好') {
            $wechat->reply("你好！");
        } else {
            $wechat->reply("听不懂！");
        }
        $data = ob_get_clean();
        $this->getResponse()->end($data);
    }

}