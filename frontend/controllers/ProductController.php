<?php

namespace frontend\controllers;

use common\helpers\Tools;
use common\models\Goods;
use Yii;
use common\models\Category;

class ProductController extends \yii\web\Controller
{
    public $layout = 'navmain';

    public function actionIndex()
    {
        $gid = intval(Yii::$app->request->get('gid'));

        // 存储历史记录
        Tools::history($gid);

        $goodsInfo = Goods::getGoodsInfo($gid);
        if(empty($goodsInfo))
        {
            return $this->goBack();
        }

        // 查询主导航
        $navigation = Category::getNavigation();
        $this->view->params['navigation'] = $navigation;

        // 读取最近浏览
        $historyList = Goods::historyList(Tools::history());
        $data = [
            'goodsInfo'     =>$goodsInfo,
            'historyList'   =>$historyList
        ];

        return $this->render('index',$data);
    }



}
