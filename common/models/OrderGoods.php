<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order_goods}}".
 *
 * @property integer $rec_id
 * @property string $goods_name
 * @property string $goods_sn
 * @property integer $product_id
 * @property integer $buy_number
 * @property string $goods_price
 * @property string $goods_attr
 * @property integer $order_id
 *
 * @property OrderInfo $order
 */
class OrderGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['product_id', 'buy_number', 'order_id'], 'integer'],
            [['goods_price'], 'number'],
            [['goods_name'], 'string', 'max' => 120],
            [['attr_list'], 'string', 'max' => 45],
            [['goods_sn'], 'string', 'max' => 30],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderInfo::className(), 'targetAttribute' => ['order_id' => 'order_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rec_id' => 'Rec ID',
            'goods_name' => 'Goods Name',
            'goods_sn' => 'Goods Sn',
            'product_id' => 'Product ID',
            'buy_number' => 'Buy Number',
            'goods_price' => 'Goods Price',
            'goods_attr' => 'Goods Attr',
            'order_id' => 'Order ID',
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
     * 添加订单商品
     *
     * @param $goodsList
     * @param $orderId
     * @return bool
     */
    public function createOrderGoods($goodsList,$orderId)
    {
        if(is_array($goodsList) && !empty($goodsList) && !empty($orderId))
        {
            foreach ($goodsList as $goods)
            {
                $goods['order_id'] = $orderId;
                $_this = new self();
                if($_this->load(['OrderGoods'=>$goods]) && $_this->validate())
                {
                    if(!$_this->save())
                    {
                        return false;
                    }
                }
                else
                {
                    // print_r($_this->getErrors());
                    return false;
                }
            }
            return true;
        }
        return false;
    }
}
