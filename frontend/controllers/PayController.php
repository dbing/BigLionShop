<?php

namespace frontend\controllers;

use common\models\OrderInfo;
use common\models\PayLog;
use common\models\Refund;
use frontend\components\AjaxReturn;
use frontend\models\Cart;
use frontend\models\Payment;
use frontend\models\Region;
use frontend\models\UserAddress;
use yii;
use common\models\Category;
use yii\base\Exception;


class PayController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    /**
     *  同步地址处理
     */
    public function actionReturn()
    {
        $get = Yii::$app->request->get();
        // 验签
        $result = Yii::$app->alipay->verifyReturn();
        if($result)
        {
            // 记录支付日志
            PayLog::write('R',$get['out_trade_no'],$get);

            if($get['trade_status'] == 'TRADE_SUCCESS' || $get['trade_status'] == 'TRADE_FINISHED')
            {
                // 判断该笔订单是否已经处理过
                if(OrderInfo::updateOrder($get['out_trade_no'],$get['total_fee'],$get['trade_no']))
                {
                    Yii::$app->session->setFlash('alert',(new AjaxReturn(AjaxReturn::SUCCESS,'恭喜您支付成功，订单：'.$get['out_trade_no'].'！'))->returned());
                }
                else
                {
                    Yii::$app->session->setFlash('alert',(new AjaxReturn(AjaxReturn::ERROR,'订单状态处理异常，请联系客服.'))->returned());
                }

            }
            else
            {
                Yii::$app->session->setFlash('alert',(new AjaxReturn(AjaxReturn::ERROR,'订单支付失败,订单号：'.$get['out_trade_no']))->returned());
            }
        }
        else
        {
            Yii::$app->session->setFlash('alert',(new AjaxReturn(AjaxReturn::ERROR,'签名校验失败，订单支付失败,订单号：'.$get['out_trade_no']))->returned());

        }
        Yii::$app->response->redirect(['user/my-order']);

    }


    /**
     * 异步通知处理
     */
    public function actionNotify()
    {
        $post = Yii::$app->request->post();
        // 验签
        if(Yii::$app->alipay->verifyNotify())
        {
            // 记录支付日志
            PayLog::write('N',$post['out_trade_no'],$post);

            // 判断该笔订单是否已经处理过
            if(OrderInfo::updateOrder($post['out_trade_no'],$post['total_fee'],$post['trade_no']))
            {
                echo 'success';
            }
            else
            {
                echo 'fail';
            }

        }
        else
        {
            echo 'fail';
        }
    }  
    
    /** 
     * 支付宝退款的异步处理
     */
    public function actionRefund()
    {
        //$temp ='{"sign":"d0edfcf25159eb85f3bd8864187cffc9","result_details":"2017112021001104700563308219^0.11^SUCCESS","notify_time":"2017-11-20 20:50:43","sign_type":"MD5","notify_type":"batch_refund_notify","notify_id":"3d9480c7ec6def50726b3804231ed59igy","batch_no":"201711200000001","success_num":"1"}';
        //$_POST = json_decode($temp,true);
        file_put_contents('refund-'.rand(1000,9999).'.log',json_encode($_POST));
        //die;

        // 验签
        $result = Yii::$app->alipay->refundNotify();
        //var_dump($result);die();
        if($result){
            
            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            
            //批次号
            $batchNo = $_POST['batch_no'];

            //批量退款数据中转账成功的笔数
            $successNum = $_POST['success_num'];

            //批量退款数据中的详细信息
            $resultDetails = $_POST['result_details'];
            
            // 支付宝处理时间
            $notifyTime = $_POST['notify_time'];
            
            //判断是否在商户网站中已做过这次通知的处理,然后再决定是否执行商户的业务程序
            if($successNum == 1)
            {
                // 1.订单表：订单状态要改为 5；支付状态：2：
                // 2.退款申请改为：1 记录退款时间  
                
                $details = explode('^',$resultDetails);
                if($details[2] == 'SUCCESS')
                {
                    $action = Yii::$app->db->beginTransaction();
                    try
                    {

                        if(!OrderInfo::updateRowOrderRefund($details))
                        {
                            throw new Exception('订单信息表退款状态更改异常');
                        }
                        
                        if(!Refund::updateRowRefund($batchNo,$details[2],strtotime($notifyTime)))
                        {
                            throw new Exception('申请退款记录表数据更改异常');
                        }

                        $action->commit();
                        
                        echo "success";     //请不要修改或删除

                    }
                    catch(Exception $e)
                    {
                    
                        Yii::error($e->getMessage(),'pay');
                        $action->rollback();
                    }
                }
                else
                {
                    // 处理支付宝相应退款失败
                    if(!Refund::updateRowRefund($batchNo,$details[2],strtotime($notifyTime),false))
                    {
                        Yii::error('您有一笔退款支付处理失败了.交易流水号：'.$details[0],'refund');
                    }
                    
                }
            }
            else
            {
                // 多笔退款
                exit(2);
            }
         
        }
        else
        {
            //验证失败
            echo "fail";
            Yii::error('一笔退款验签失败了,详细数据:'.$_POST['result_details'],'sign');

        }

    }    

    public function actionTest()
    {
        //\Yii::error('message', 'category');       
        \Yii::warning([
    'msg' => 'message-warn',
    'extra' => 'value',
], 'type');
    }

}