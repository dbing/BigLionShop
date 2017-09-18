<?php

namespace backend\controllers;

use common\helpers\Tools;
use common\models\Brand;
use common\models\Category;
use common\models\Goods;
use common\models\UploadForm;
use Yii;

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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
