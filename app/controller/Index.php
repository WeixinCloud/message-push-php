<?php
// +----------------------------------------------------------------------
// | 文件: index.php
// +----------------------------------------------------------------------
// | 功能: 提供todo api接口
// +----------------------------------------------------------------------
// | 时间: 2022-01-23 16:20
// +----------------------------------------------------------------------
// | 作者: rangangwei<gangweiran@tencent.com>
// +----------------------------------------------------------------------

namespace app\controller;

use Exception;
use think\response\Html;
use think\facade\Log;

class Index
{

    /**
     * 主页静态页面
     * @return Html
     */
    public function get(): Html
    {
        # html路径: ../view/index.html
        return response(file_get_contents(dirname(dirname(__FILE__)).'/view/index.html'));
    }

    public function post()
    {
        try {
            $openid = request()->header('x-wx-openid');
            $msg = request()->param();
            $req = array(
                'touser' => $openid ,
                'msgtype' => 'text',
                'text' => array(
                    'content'  => '云托管接收消息推送成功，内容如下: '.json_encode($msg)."\n"
                )
              );

            Log::write('send_msg req: '.json_encode($req));
            $rsp = send_msg('http://api.weixin.qq.com/cgi-bin/message/custom/send', json_encode($req));
            Log::write('send_msg rsp: '.json_encode($rsp));
            return json_encode($rsp);
        } catch (Exception $e) {
            Log::write('send_msg error: '.$e);
            return $e;
        }
    }
}

function send_msg($url , $req) {
    $options = array (
      'http' => array (
        'method' => 'POST' ,
        'header' => 'Content-type: application/json;charset=utf-8',
        'content' => $req,
        'timeout' => 15
      )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url , false, $context);
    return $result ;
 }
