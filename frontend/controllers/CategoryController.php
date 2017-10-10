<?php

namespace frontend\controllers;

use common\models\Goods;
use Yii;
use common\models\Category;
use yii\data\Pagination;

class CategoryController extends \yii\web\Controller
{
    public $layout = 'navmain';

    public function actionIndex()
    {
        // 查询分类信息
        $cid = intval(Yii::$app->request->get('cid',0));
        $catInfo = Category::getCategoryInfo($cid);
        if(!$catInfo)
        {
            Yii::$app->response->redirect(['index/index']);eixt;
        }

        // 查询主导航
        $this->view->params['navigation'] = Category::getNavigation();

        // 查询面包屑
        $this->view->params['breadcrumb'] = Category::getBreadcrumb($cid);

        // 查询分类商品
        $goods = Goods::getGoodsByCatId($cid);

        // 查询指定分类下精品列表
        $cateRecommond = Goods::getRecommendGoods('is_best','','5',$cid);

        $data = [
            'goodsList'     =>$goods['goodsList'],
            'pagination'    =>$goods['pagination'],
            'cateRecommond' =>$cateRecommond
        ];

        return $this->render('index',$data);
    }

}
