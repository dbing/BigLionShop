<?php

namespace backend\controllers;

use backend\models\Shipping;
use common\helpers\Tools;
use yii;
use common\models\OrderInfo;

class OrderController extends \yii\web\Controller
{
    public function actionDetail()
    {
        $oid = Yii::$app->request->get('oid');
        $orderInfo = OrderInfo::getOrderInfo($oid);

        return $this->render('detail',['orderInfo'=>$orderInfo]);
    }

    public function actionIndex()
    {
        $order = OrderInfo::getOrderList();
        return $this->render('index',['data'=>$order]);
    }

    /**
     * 发货
     *
     * @return string
     */
    public function actionShip()
    {
        $oid = Yii::$app->request->get('oid');
        $order = OrderInfo::findOne($oid);

        if(Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post();
            // 1.更新订单配送表中发货信息
            if($order->load(['OrderInfo'=>$post]) && $order->validate())
            {
                $order->shipping_time = time();
                $order->shipping_name = Shipping::getShipName($order->shipping_id);
                $order->shipping_status = OrderInfo::SHIP_SHIPED;
                if($order->save())
                {
                    Tools::success('发货成功.',['order/detail','oid'=>$oid]);
                }
                else
                {
                    Tools::error('发货失败.',['order/ship','oid'=>$oid]);
                }
            }
            // 2.生成发货单，记录发货单信息
            // 3.记录发货商品到发货单商品表

        }
        $shipList = Shipping::getShipList();
        return $this->render('ship',['order'=>$order,'shipList'=>$shipList,'oid'=>$oid]);
    }

}
