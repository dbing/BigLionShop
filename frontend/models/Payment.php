<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%payment}}".
 *
 * @property integer $pay_id
 * @property string $pay_name
 * @property string $pay_desc
 * @property string $pay_config
 * @property integer $enabled
 */
class Payment extends \yii\db\ActiveRecord
{
    const IS_ONLINE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%payment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enabled'], 'integer'],
            [['pay_name'], 'string', 'max' => 45],
            [['pay_desc', 'pay_config'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pay_id' => 'Pay ID',
            'pay_name' => 'Pay Name',
            'pay_desc' => '支付方式介绍',
            'pay_config' => 'Pay Config',
            'enabled' => '是否安装 0未安装；1已安装',
        ];
    }

    /**
     * 查询以上线的支付方式
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    static function getPay()
    {
        return self::find()->where(['enabled'=>self::IS_ONLINE])->asArray()->all();
    }
}
