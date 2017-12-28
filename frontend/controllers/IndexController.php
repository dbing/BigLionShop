<?php

namespace frontend\controllers;

use common\helpers\Tools;
use common\models\Brand;
use common\models\GoodsGallery;
use Yii;
use common\models\Category;
use common\models\Goods;
use frontend\models\Slider;

class IndexController extends \yii\web\Controller
{

/*
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['index'],
                'duration' => 50,
                
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => 'SELECT COUNT(*) FROM post',
                ],
                
            ],
        ];
    }
*/

    public function actionIndex()
    {
        
        // 查询全部商品分类
        $navigation = Yii::$app->cache->get('navigation');
    
        if($navigation === false)
        {
            $navigation = Category::getNavigation();
            Yii::$app->cache->set('navigation',$navigation);
        }
        
        // 查询轮播图
        $slider = Slider::getSlider();

        // 查询促销商品
        $promotes = Goods::getPromoteGoods();
        $mainPromote = array_pop($promotes);
        $mainPromote['galleries'] = (new GoodsGallery)->getGalleries($mainPromote['goods_id']);

        // 读取最近浏览
        $historyList = Goods::historyList(Tools::history());



        $data = [
            'navigation'=>$navigation,
            'slider'    =>$slider,
            'bestGoods' =>Goods::getRecommendGoods(),   // 查询推荐商品
            'newGoods'  =>Goods::getRecommendGoods('is_new'),
            'hotGoods'  =>Goods::getRecommendGoods('is_hot'),
            'promotes'  =>$promotes,
            'mainPromote'=>$mainPromote,
            'historyList'=>$historyList
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


    public function actionTest()
    {
        $dependency = new \yii\caching\FileDependency(['fileName' => 'example.txt']);
        var_dump($dependency);

        var_dump(Yii::$app->cache);

        Yii::$app->cache->set('key','braem',7200,$dependency);



    }

    public function actionGet()
    {
        $key = Yii::$app->cache->get('key');
        var_dump($key);
    }
}
