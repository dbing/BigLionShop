<?php

namespace backend\controllers;

use backend\models\OrderAction;
use backend\models\Shipping;
use common\helpers\Tools;
use frontend\models\User;
use yii;
use common\models\OrderInfo;

class OrderController extends \yii\web\Controller
{
    /**
     * 订单详情
     *
     * @return string
     */
    public function actionDetail()
    {
        $oid = Yii::$app->request->get('oid');
        $orderInfo = OrderInfo::getOrderInfo($oid);

        return $this->render('detail',['orderInfo'=>$orderInfo]);
    }

    /**
     * 订单列表
     *
     * @return string
     */
    public function actionIndex()
    {
        $order = OrderInfo::getOrderList();
        return $this->render('index',['data'=>$order]);
    }

    /**
     * 取消订单
     */
    public function actionCancel()
    {
        $oid = Yii::$app->request->get('oid');

        $order = OrderInfo::findOne($oid);
        if(!is_null($order) && $order->pay_status == OrderInfo::PAY_SUCCESS)
        {
            // 已经支付订单-取消操作
            $type = Yii::$app->request->post('cancel_type');
            $node = Yii::$app->request->post('node');
            if(Yii::$app->request->isPost)
            {

                if($type  == 'SEND_BACK')
                {
                    // 原路退款


                }
                elseif($type  == 'MONEY_BACK')
                {
                    // 退到用户余额
                    $user = User::findOne($order->user_id);
                    $user->user_money += $order->order_amount;
                    $transaction = Yii::$app->db->beginTransaction();
                    try
                    {
                        // 退钱到用户余额
                        if(!$user->save())
                        {
                            throw new yii\base\Exception('操作失败.');
                        }
                        // 订单状态置为取消
                        $order->order_status = OrderInfo::ORDER_CANCEL;
                        $order->pay_status = OrderInfo::PAY_ERROR;
                        if(!$order->save())
                        {
                            throw new yii\base\Exception('操作失败.');
                        }

                        $transaction->commit();
                        // 记录日志
                        OrderAction::write($oid,'取消','成功',$node);
                        Tools::success('订单取消成功.',['order/detail','oid'=>$oid]);

                    }
                    catch (yii\base\Exception $e)
                    {
                        $transaction->rollBack();
                        // 记录日志
                        OrderAction::write($oid,'取消','失败',$node);
                        Tools::error('操作失败.',['order/ship','oid'=>$oid]);

                    }

                }
                elseif($type == 'NOT_DO')
                {
                    // 不处理
                    $order->order_status = OrderInfo::ORDER_CANCEL;
                    $order->pay_status = OrderInfo::PAY_ERROR;
                    if($order->save())
                    {
                        // 记录日志
                        OrderAction::write($oid,'取消','成功',$node);
                        Tools::success('订单取消成功.',['order/detail','oid'=>$oid],false);
                    }
                    else
                    {
                        // 记录日志
                        OrderAction::write($oid,'取消','失败',$node);
                        Tools::error('操作失败.',['order/ship','oid'=>$oid],false);
                    }

                }


            }
            return $this->render('cancel',['oid'=>$oid,'type'=>$type]);
        }
        else
        {

            // 未支付订单-取消操作
            $order->order_status = OrderInfo::ORDER_CANCEL;
            if($order->save())
            {
                // 记录日志
                OrderAction::write($oid,'取消','成功');
                Tools::success('订单取消成功.',['order/detail','oid'=>$oid],false);
            }
            else
            {
                // 记录日志
                OrderAction::write($oid,'取消','失败');
                Tools::error('操作失败.',['order/ship','oid'=>$oid],false);
            }
        }

        Yii::$app->response->redirect(['order/detail','oid'=>$oid]);

    }

    /**
     * 支付订单
     */
    public function actionPay()
    {
        $oid = Yii::$app->request->get('oid');
        if(OrderInfo::payOrder($oid))
        {
            // 记录日志
            OrderAction::write($oid,'支付','成功');
            Tools::success('订单支付成功.',['order/detail','oid'=>$oid],false);

        }
        else
        {
            // 记录日志
            OrderAction::write($oid,'支付','失败');
            Tools::error('操作失败.',['order/ship','oid'=>$oid],false);
        }
        Yii::$app->response->redirect(['order/detail','oid'=>$oid]);
    }

    /**
     * 确认订单
     */
    public function actionConfirm()
    {
        $oid = Yii::$app->request->get('oid');
        if(OrderInfo::confirmOrder($oid))
        {
            // 记录日志
            OrderAction::write($oid,'确认','成功');
            Tools::success('订单已确认.',['order/detail','oid'=>$oid],false);

        }
        else
        {
            // 记录日志
            OrderAction::write($oid,'确认','失败');
            Tools::error('操作失败.',['order/ship','oid'=>$oid],false);
        }
        Yii::$app->response->redirect(['order/detail','oid'=>$oid]);
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
                    // 记录日志
                    OrderAction::write($oid,'发货','成功');
                    Tools::success('发货成功.',['order/detail','oid'=>$oid]);
                }
                else
                {
                    // 记录日志
                    OrderAction::write($oid,'发货','失败');
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
