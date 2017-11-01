<?php

namespace backend\controllers;

use common\models\OrderInfo;

class OrderController extends \yii\web\Controller
{
    public function actionDetail()
    {
        return $this->render('detail');
    }

    public function actionIndex()
    {
        $order = OrderInfo::getOrderList();

        return $this->render('index',['data'=>$order]);
    }

    public function actionShip()
    {
        return $this->render('ship');
    }

}
