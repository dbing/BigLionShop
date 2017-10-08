<?php

namespace frontend\controllers;

use common\models\Category;

class IndexController extends \yii\web\Controller
{
    public function actionIndex()
    {
        // 查询全部商品分类
        $navigation = Category::getNavigation();


        return $this->render('index',['navigation'=>$navigation]);
    }

}
