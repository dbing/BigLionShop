<?php

namespace frontend\controllers;

use common\models\Goods;
use Yii;
use common\models\Category;

class ProductController extends \yii\web\Controller
{
    public $layout = 'navmain';

    public function actionIndex()
    {
        $gid = intval(Yii::$app->request->get('gid'));

        $goodsInfo = Goods::getGoodsInfo($gid);
        if(empty($goodsInfo))
        {
            return $this->goBack();
        }
//var_dump($goodsInfo);
        // 查询主导航
        $navigation = Category::getNavigation();
        $this->view->params['navigation'] = $navigation;

        $data = [
            'goodsInfo' =>$goodsInfo
        ];

        return $this->render('index',$data);
    }

}
