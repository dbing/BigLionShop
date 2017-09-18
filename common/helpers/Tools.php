<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/9/14
 * @Time:   11:06
 */
namespace common\helpers;

use common\models\Goods;
use yii;

class Tools
{


    static function success($msg='',$url=[],$skip=true,$wait=3)
    {
        $url = !empty($url) ? yii\helpers\Url::toRoute($url) : '';
        Yii::$app->session->setFlash('alerts',['msg'=>$msg,'url'=>$url,'state'=>1,'wait'=>$wait,'skip'=>$skip]);
    }

    static function error($msg,$url=[],$skip=true,$wait=3)
    {
        $url = !empty($url) ? yii\helpers\Url::toRoute($url) : '';
        Yii::$app->session->setFlash('alerts',['msg'=>$msg,'url'=>$url,'state'=>0,'wait'=>$wait,'skip'=>$skip]);
    }

    /**
     * 货号
     * @return string
     */
    static function createGoodsSn()
    {
        $snPrefix = Yii::$app->params['snPrefix'];
        $goodsSn =  $snPrefix . strtoupper(uniqid()) . rand(1000,9999);

        if(Goods::find()->select('goods_sn')->where('goods_sn=:sn',[':sn'=>$goodsSn])->count() > 0)
        {
            echo '-----------';
            return self::createGoodsSn();
        }
        return $goodsSn;

    }
}