<?php

namespace frontend\controllers;

use common\helpers\Tools;
use common\models\Goods;
use frontend\models\Cart;
use Yii;
use common\models\Category;
use yii\web\Response;

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

        // 查询面包屑
        $this->view->params['breadcrumb'] = Category::getBreadcrumb($goodsInfo['cat_id'],$goodsInfo['goods_name']);

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


    public function actionAddToCart()
    {
        $gid = intval(Yii::$app->request->get('gid'));
        $num = intval(Yii::$app->request->get('num',1));
        $spec = empty(Yii::$app->request->get('spec','')) ? '' : json_encode(Yii::$app->request->get('spec',''));

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = Cart::addToCart($gid,$num,$spec);
    }

}
