<?php

namespace frontend\controllers;

class ProductController extends \yii\web\Controller
{
    public $layout = 'navmain';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
