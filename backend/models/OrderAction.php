<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%order_action}}".
 *
 * @property string $action_id
 * @property string $action_user
 * @property string $action_content
 * @property string $action_node
 * @property integer $create_time
 * @property integer $order_id
 *
 * @property OrderInfo $order
 */
class OrderAction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_action}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'order_id'], 'integer'],
            [['order_id'], 'required'],
            [['action_user'], 'string', 'max' => 45],
            [['action_content', 'action_node'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderInfo::className(), 'targetAttribute' => ['order_id' => 'order_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'action_id' => 'Action ID',
            'action_user' => '操作该次的人员 ',
            'action_content' => '操作内容',
            'action_node' => '操作备注',
            'create_time' => '创建时间',
            'order_id' => '被操作的订单ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(OrderInfo::className(), ['order_id' => 'order_id']);
    }
}
