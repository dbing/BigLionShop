<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%shipping}}".
 *
 * @property string $shipping_id
 * @property string $shipping_code
 * @property string $shipping_name
 * @property integer $enabled
 * @property string $shipping_config
 */
class Shipping extends \yii\db\ActiveRecord
{
    const IS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shipping}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enabled'], 'integer'],
            [['shipping_code'], 'string', 'max' => 20],
            [['shipping_name', 'shipping_config'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shipping_id' => 'Shipping ID',
            'shipping_code' => '用于物流查询',
            'shipping_name' => '配送物流名',
            'enabled' => '是否安装 0未安装；1已安装',
            'shipping_config' => '配送配置',
        ];
    }

    /**
     * 查询快递公司名
     *
     * @param $sid
     * @return string
     */
    static public function getShipName($sid)
    {
        $ship = self::findOne($sid);
        if(is_null($ship))
        {
            return '';
        }
        else
        {
            return $ship->shipping_name;
        }
    }

    /**
     * 查询已经安装物流公司
     *
     * @return null
     */
    static public function getShipList()
    {
        $shipList = self::find()->where(['enabled'=>self::IS_ACTIVE])
            ->asArray()
            ->all();
        if(!is_null($shipList))
        {
            $result = [];
            foreach ($shipList as $ship)
            {
                $result[$ship['shipping_id']] = $ship['shipping_name'];
            }
            return $result;
        }
        else
        {
            return null;
        }
    }
}
