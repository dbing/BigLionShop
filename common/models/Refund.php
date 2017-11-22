<?php

namespace common\models;

use Yii;

/**
 * 退款模型
 *
 * @property integer $refund_id
 * @property integer $order_id
 * @property string $refund_cause
 * @property string $refund_amount
 * @property integer $user_id
 * @property integer $refund_status
 *
 * @property OrderInfo $order
 */
class Refund extends \yii\db\ActiveRecord
{

    const REFUND_ERROR = 0;     // 退款失败
    const REFUND_SUCCESS = 1;   // 退款成功
    const REFUND_CHECKED = 2;   // 已提交（审核中）

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_refund}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'refund_amount', 'user_id'], 'required'],
            [['order_id', 'user_id', 'refund_status','create_time','notify_time','confirm_time'], 'integer'],
            [['refund_amount'], 'number'],
            [['refund_cause'], 'string', 'max' => 255],
            ['batch_no', 'string', 'max' => 25],
            [['error_code'], 'string', 'max' => 45],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderInfo::className(), 'targetAttribute' => ['order_id' => 'order_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'refund_id' => '退款ID',
            'order_id' => 'Order ID',
            'refund_cause' => '退款原因',
            'refund_amount' => '退款金额',
            'user_id' => '用户ID',
            'refund_status' => '0:失败 1：成功2已提交（审核中）',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(OrderInfo::className(), ['order_id' => 'order_id']);
    }
    /**
     * 创建订单退款信息
     * @return bool 
     */
    public function createRefundInfo($post)
    {
        
        $post['user_id']  = yii::$app->user->getId();
        $tradeNo          = (new OrderInfo)->find()->select('trade_no')
            ->where(['order_sn' => $post['order_sn'], 'order_id' => $post['order_id'], 'user_id' => $post['user_id']])
            ->asArray()->one();
        $post['trade_no'] = $tradeNo['trade_no'];
        if($this->load(['Refund' => $post]) && $this->validate())
        {
            return $this->save();
        }
    }

    /**
     * 获取所有退款订单信息
     * @return array 
     */
    static public function refundList()
    {
        $refund = self::find()->all();
        if(is_null($refund))
        {
            return null;
        }
        else
        {
            $result = [];
            foreach($refund as $key=>$value)
            {
                $temp =  yii\helpers\ArrayHelper::toArray($value);
                $temp['order_sn'] = $value->order->order_sn;
                $temp['trade_no'] = $value->order->trade_no;
                $result[] = $temp;
            }   
            return $result;
            
        }
    }

    /**
     * 查询单条退款申请
     */
    static public function getRefundInfo($rid)
    {
        $result = [];
        $refund = self::find()->where(['refund_id'=>$rid])->one();
        if(!is_null($refund))
        {
            $result = yii\helpers\ArrayHelper::toArray($refund);
            $result['trade_no'] = $refund->order->trade_no;
            
        }
        return $result;
    }

    /**
     * 处理支付宝异步退款信息
     * @param   string  $batchNo    批次号
     * @param   string  $errorCode  支付宝退款码
     * @param   string  $notifyTime 支付宝退款时间
     * @param   string  $status     处理申请退款标识(true:成功;false:失败)
     */
    static public function updateRowRefund($batchNo,$errorCode,$notifyTime,$status=true)
    {
        $refund = self::find()->where(['batch_no'=>$batchNo])->one();
        if(is_null($refund))
        {
            return false;
        }
        if($status)
        {
            // 将退款申请置为成功.
            if($refund->refund_status == self::REFUND_CHECKED)
            {
                $refund->refund_status = self::REFUND_SUCCESS;
                $refund->notify_time = $notifyTime;
                $refund->error_code = $errorCode;
                return $refund->save();
            }
            return true;
        }
        else
        {
            // 将退款申请置为失败.
            $refund->refund_status = self::REFUND_ERROR;
            $refund->error_code = $errorCode;
            $refund->notify_time = $notifyTime;
            return $refund->save();
        }

    }

}
