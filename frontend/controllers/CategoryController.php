<?php

namespace frontend\controllers;

use Yii;
use common\models\Category;

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
//        print_r($navigation);
        $data = [

        ];

        return $this->render('index',$data);
    }

}
