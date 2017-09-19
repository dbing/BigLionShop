<?php

namespace backend\controllers;

use common\helpers\Tools;
use common\models\Brand;
use common\models\Category;
use common\models\Goods;
use common\models\UploadForm;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class GoodsController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $goods = new Goods();
        $upload = new UploadForm();
        if(Yii::$app->request->isPost)
        {
            if($goods->createGoods())
            {
                Tools::success('商品添加成功',['goods/index']);
            }
            else
            {
                Tools::error('商品添加失败');
            }
        }


        // 下拉菜单
        $catList = (new Category())->dropDownList();
        $brandList = (new Brand())->dropDownList();

        return $this->render('create',['goods'=>$goods,'upload'=>$upload,'catList'=>$catList,'brandList'=>$brandList]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex($cid = '', $bid = '', $property = '', $sale = null, $name = null)
    {
        $map = ['cid' => $cid, 'bid' => $bid, 'property' => $property, 'name' => $name,'sale'=>$sale]; //搜索条件

        $catList = (new Category)->dropDownList();
        $brandList = (new Brand())->dropDownList();

        $query = $this->_search($map,Goods::find());

        $page = new Pagination(['defaultPageSize' => yii::$app->params['pageSize'], 'totalCount' => $query->count()]);

        $goodsList = $query->offset($page->offset)
            ->limit($page->limit)
            ->all();


        return $this->render('index',['map'=>$map,'catList'=>$catList,'brandList'=>$brandList,'page'=>$page,'goodsList'=>$goodsList]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    /**
     * 处理搜索条件
     *
     * @param $map
     * @param $query
     * @return mixed
     */
    private function _search($map,$query)
    {

        $query->where('is_delete=:isdel',[':isdel'=>0]);

        // 处理分类搜索条件
        if(!empty($map['cid']))
        {
            $childs = Category::getLevelCategories(Category::find()->select('cat_id,parent_id,cat_name')->asArray()->all(),'',$map['cid']);

            $cids = ArrayHelper::getColumn($childs,'cat_id');
            array_push($cids,$map['cid']);

            $query->andWhere(['in','cat_id',$cids]);
            // $query->andWhere('cat_id=:cid',[':cid'=>$map['cid']]);
        }

        // 处理品牌搜索条件
        if(!empty($map['bid']))
        {
            $query->andWhere('brand_id=:bid',[':bid'=>$map['bid']]);
        }

        // 处理其他搜索条件
        if(!empty($map['property']))
        {
            $query->andWhere([$map['property']=>1]);
        }

        if(is_numeric($map['sale']))
        {
            $query->andWhere(['is_on_sale'=>$map['sale']]);
        }

        if(isset($map['name']) && !empty($map['name']))
        {
            $query->andWhere(['like','goods_name',$map['name']]);
        }

        return $query;
    }


}
