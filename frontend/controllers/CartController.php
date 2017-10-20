<?php

namespace frontend\controllers;

use frontend\components\AjaxReturn;
use frontend\models\Cart;
use Yii;
use yii\web\Response;

class CartController extends \yii\web\Controller
{

    public $userId;

    public function init()
    {
        // 验证是否登录
        if(Yii::$app->user->isGuest)
        {
            return $this->goBack();
        }
        $this->userId = Yii::$app->user->getId();
    }

    public function actionIndex()
    {
        // 查询购物车商品
        $cart = Cart::getCartList();
        return $this->render('index',['cart'=>$cart]);
    }


    /**
     * 删除购物车商品
     */
    public function actionDelete()
    {

        $cid = Yii::$app->request->get('cid') + 0;

        if($cart = Cart::findOne(['cart_id'=>$cid,'user_id'=>$this->userId]))
        {
            if($cart->delete())
            {
                $cart = Cart::getCartList();
                $data['navcart'] = $this->renderPartial('loadcart',['cart'=>$cart]);
                $data['viewcart'] = $this->renderPartial('index',['cart'=>$cart]);
                (new AjaxReturn(AjaxReturn::SUCCESS,'删除操作成功',$data))->send();
            }
            else
            {
                (new AjaxReturn(AjaxReturn::ERROR,'删除操作失败'))->send();
            }
        }
        else
        {
            (new AjaxReturn(AjaxReturn::ERROR,'参数有误'))->send();
        }

    }


    /**
     * 购物车商品数量加减
     */
    public function actionChangeNum()
    {

        $type = intval(Yii::$app->request->get('type',1));
        $cid = intval(Yii::$app->request->get('cid'));
        $num = (intval(Yii::$app->request->get('num',1)) > 0) ? intval(Yii::$app->request->get('num',1)) : 1 ;
        if($cart = Cart::findOne(['cart_id'=>$cid,'user_id'=>$this->userId]))
        {
            $info = Cart::getInfo($cart['goods_id'], $cart['attr_list']);
            if($num > $info['product_num'] && $type)
            {
                (new AjaxReturn(AjaxReturn::ERROR,'库存不足'))->send();
            }
            else
            {
                // 修改购买量
                $cart->buy_number = $num;
                if($cart->save())
                {
                    $cart = Cart::getCartList();
                    $data['navcart'] = $this->renderPartial('loadcart',['cart'=>$cart]);
                    $data['viewcart'] = $this->renderPartial('index',['cart'=>$cart]);
                    (new AjaxReturn(AjaxReturn::SUCCESS,'操作成功',$data))->send();
                }
                else
                {
                    (new AjaxReturn(AjaxReturn::ERROR,'操作失败'))->send();
                }
            }
        }
        else
        {
            (new AjaxReturn(AjaxReturn::ERROR,'参数有误'))->send();
        }

    }

    /**
     * 加载导航栏购物车
     *
     * @return string
     */
    public function actionLoadCart()
    {
        // 查询购物车商品
        $cart = Cart::getCartList();
        return $this->renderPartial('loadcart',['cart'=>$cart]);
    }



}
