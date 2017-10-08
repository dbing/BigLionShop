<?php

namespace frontend\controllers;

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

        // 查询推荐商品

        $data = [
            'navigation'=>$navigation,
            'slider'    =>$slider,
            'bestGoods' =>Goods::getRecommendGoods(),
            'newGoods' =>Goods::getRecommendGoods('is_new'),
            'hotGoods' =>Goods::getRecommendGoods('is_hot'),
        ];

        return $this->render('index',$data);
    }

}
