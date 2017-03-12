<?php
/**
 * User: Peter Wang
 * Date: 17/2/8
 * Time: 下午6:30
 */

namespace App\Glob\Service\Wx;


use App\Lib\Support\WxSDK\Wechat;
use App\Lib\Support\WxSDK\Api;

class WxService
{

    public static function getApi($appName='',$request, $response)
    {
        $config = config()->get("app.wx");
        $config = $config[$appName];
        $appId = $config['appId'];
        $appSecret = $config['appSecret'];

        $accessTokenSaveKey = "access_token_".$appName;

        $api = new Api(
            array(
                'appId' => $appId,
                'appSecret' => $appSecret,
                'get_access_token' => function()use($accessTokenSaveKey){
                    // 用户需要自己实现access_token的返回
                    return cache()->get($accessTokenSaveKey);
                },
                'save_access_token' => function($token)use($accessTokenSaveKey){
                    // 用户需要自己实现access_token的保存
                    cache()->set($accessTokenSaveKey, $token);
                }
            ),$request, $response
        );
        return $api;
    }
    
    public static function getWeChat($appName='', $request='', $response='')
    {
        $config = config()->get("app.wx");
        $config = $config[$appName];
        $appId = $config['appId'];
        $token = $config['token'];
        $encodingAESKey = $config['encodingAESKey'];

        $wechat = new Wechat(array(
            // 开发者中心-配置项-AppID(应用ID)
            'appId'         =>  $appId,
            // 开发者中心-配置项-服务器配置-Token(令牌)
            'token'         =>  $token,
            // 开发者中心-配置项-服务器配置-EncodingAESKey(消息加解密密钥)
            // 可选: 消息加解密方式勾选 兼容模式 或 安全模式 需填写
            'encodingAESKey' => $encodingAESKey
        ),$request, $response);

        return $wechat;
    }

}