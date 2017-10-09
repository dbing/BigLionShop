<?php

namespace frontend\controllers;

use common\models\Category;

class CategoryController extends \yii\web\Controller
{
    public $layout = 'navmain';

    public function actionIndex()
    {
        // 查询主导航
        $this->view->params['navigation'] = Category::getNavigation();
//        print_r($navigation);
        $data = [

        ];

        return $this->render('index',$data);
    }

}
