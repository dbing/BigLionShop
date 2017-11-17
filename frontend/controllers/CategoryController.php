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
            Yii::$app->response->redirect(['index/index']);
        }

        // 查询主导航
        $navigation = Yii::$app->cache->get('navigation');
        if($navigation === false)
        {
            $navigation = Category::getNavigation();
            Yii::$app->cache->set('navigation',$navigation);
        }

        $this->view->params['navigation'] = $navigation;

        // 查询面包屑
        //Yii::$ap->cache->set('crumb_',);
        $breadcrumb = Yii::$app->cache->get('crumb_'.$cid);
        if($breadcrumb === false)
        {
            $breadcrumb = Category::getBreadcrumb($cid);
            Yii::$app->cache->set('crumb_'.$cid,$breadcrumb);
        }
        $this->view->params['breadcrumb'] = $breadcrumb;

        // 加工搜索条件

        // 查询分类商品
        $key = [$this->buildFilter(),$cid];
        $goods = Yii::$app->cache->get($key);
        if($goods === false)
        {
            $goods = Goods::getGoodsByCatId($cid,$this->buildFilter());
            Yii::$app->cache->set($key,$goods);
        }
        
        // 查询指定分类下精品列表
        $cateRecommond = Goods::getRecommendGoods('is_best','','5',$cid);

        // 获取指定分类下筛选条件
        $filter = Category::getFilter($cid);

        $data = [
            'navigation'    =>$navigation,
            'goodsList'     =>$goods['goodsList'],
            'pagination'    =>$goods['pagination'],
            'cateRecommond' =>$cateRecommond,
            'filter'        =>$filter,
            'cid'           =>$cid
        ];

        return $this->render('index',$data);
    }

    /**
     * 构造搜索条件
     *
     * @return array
     */
    private function buildFilter()
    {
        $filter = [];
        $bids = Yii::$app->request->get('bid','');
        $price = Yii::$app->request->get('price');

        // 品牌搜索
        if(!empty($bids))
        {
            $filter[] = ['in','brand_id',$bids];
        }

        // 价格区间
        if(!empty($price))
        {
            $rangePrice = explode(',',$price);
            $filter[] = ['between','shop_price',$rangePrice[0],$rangePrice[1]];
        }

        return $filter;
    }

}
