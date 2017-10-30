<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pay_log}}".
 *
 * @property string $pid
 * @property string $order_sn
 * @property string $create_time
 * @property string $pay_info
 */
class PayLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pay_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time'], 'integer'],
            [['pay_info','type'], 'string'],
            [['type'], 'string', 'max' => 1],
            [['order_sn'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pid' => 'Pid',
            'order_sn' => 'Order Sn',
            'create_time' => 'Create Time',
            'pay_info' => 'Pay Info',
        ];
    }

    /**
     * 写日志
     */
    static function write($type,$orderSn,$info)
    {
        $log = new self();
        $data = [
            'create_time'   => time(),
            'type'          =>$type,
            'order_sn'      =>$orderSn,
            'pay_info'      =>json_encode($info)
        ];
        if($log->load(['PayLog'=>$data]) && $log->validate())
        {
            return $log->save();
        }
        return false;
    }
}
