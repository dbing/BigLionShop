<?php

namespace frontend\controllers;

use common\models\GoodsGallery;
use Yii;
use common\models\Category;
use common\models\Goods;
use frontend\models\Slider;

class IndexController extends \yii\web\Controller
{
    public function actionIndex()
    {
        // 查询全部商品分类
        $navigation = Category::getNavigation();

        // 查询轮播图
        $slider = Slider::getSlider();

        // 查询促销商品
        $promotes = Goods::getPromoteGoods();
        $mainPromote = array_pop($promotes);
        $mainPromote['galleries'] = (new GoodsGallery)->getGalleries($mainPromote['goods_id']);

        $data = [
            'navigation'=>$navigation,
            'slider'    =>$slider,
            'bestGoods' =>Goods::getRecommendGoods(),   // 查询推荐商品
            'newGoods'  =>Goods::getRecommendGoods('is_new'),
            'hotGoods'  =>Goods::getRecommendGoods('is_hot'),
            'promotes'  =>$promotes,
            'mainPromote'=>$mainPromote
        ];

        return $this->render('index',$data);
    }

    /**
     * 加载更多
     *
     * @return string
     */
    public function actionLoadMore()
    {
        $type = Yii::$app->request->get('type');
        $page = intval(Yii::$app->request->get('page'));
        $goodsList = Goods::getRecommendGoods($type,$page*4);

        return !empty($goodsList) ? $this->renderPartial('loadmore',['goodsList'=>$goodsList]) : '';
    }

}
