<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/10/19
 * @Time:   15:47
 */

namespace frontend\components;


use Yii;
use yii\web\Response;

class AjaxReturn
{

    const SUCCESS = 1;
    const ERROR = 0;

    /**
     * 响应状态 [0:失败 1:成功]
     *
     * @var int
     */
    public $code;

    /**
     * 响应消息
     *
     * @var null
     */
    public $msg;


    /**
     * 响应内容
     *
     * @var
     */
    public $data;


    public function __construct($code,$msg='',$data='')
    {
        $this->code = $code;
        $this->msg = $msg;
        $this->data = $data;

    }

    /**
     * 响应客户端
     *
     * @return array
     */
    public function send()
    {
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = ['code'=>$this->code,'msg'=>$this->msg,'data'=>$this->data];
        $response->send();
    }


    public function returned()
    {
        return $this;
    }



}