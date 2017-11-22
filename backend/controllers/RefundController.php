<?php
/**
 * 订单退款控制器
 */
namespace backend\controllers;

use yii;
use yii\web\Controller;
use common\models\Refund;
use frontend\components\AjaxReturn;
use yii\base\Exception;

class RefundController extends Controller
{
    public function actionList()
    {
        $refundList = Refund::refundList();
        return $this->render('list', ['refundList' => $refundList]);
    }


    /**
     * 获取退款链接
     */
    public function actionGetUrl()
    {
        
        try
        {
            $rid = intval(Yii::$app->request->get('rid'));
            if(!$rid)
            {
                throw new Exception('参数有误');
            }

            $refund = Refund::getRefundInfo($rid);

            if(empty($refund) || !is_array($refund))
            {
                throw new Exception('该退款记录有误');
            }

            $detail = $refund['trade_no'].'^'.$refund['refund_amount'].'^'.$refund['refund_cause'];

            $url = Yii::$app->alipay->refund($refund['batch_no'],1,$detail);
            (new AjaxReturn(AjaxReturn::SUCCESS,'ok',['url'=>$url]))->send();

        }
        catch(Exception $e)
        {
            (new AjaxReturn(AjaxReturn::ERROR,$e->getMessage()))->send();
        }
    }

    /**
     * 测试代码
     */
    public function actionRefund()
    {
        $batchNum = '201711210000022';
        $num = 1;
        $detail = '2017112121001104040254660553^0.11^不要啦';
        $refundUrl = Yii::$app->alipay->compose('退款','btn btn-success')->refund($batchNum,$num,$detail);
        echo $refundUrl;
        
    }

}