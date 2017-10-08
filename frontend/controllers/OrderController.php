<?php

namespace frontend\controllers;

class OrderController extends \yii\web\Controller
{
    public $layout = 'navmain';

    public function actionCheckout()
    {
        return $this->render('checkout');
    }

}
