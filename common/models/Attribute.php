<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%attribute}}".
 *
 * @property integer $attr_id
 * @property string $attr_name
 * @property string $attr_values
 * @property integer $attr_type
 * @property integer $sort
 * @property string $type_id
 *
 * @property GoodsType $type
 * @property GoodsAttr[] $goodsAttrs
 * @property Goods[] $goods
 */
use backend\models\GoodsType;

class Attribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attribute}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attr_type', 'sort', 'type_id'], 'integer'],
            [['type_id'], 'required'],
            [['attr_name'], 'string', 'max' => 45],
            [['attr_values'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => GoodsType::className(), 'targetAttribute' => ['type_id' => 'type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attr_id' => 'Attr ID',
            'attr_name' => '属性名称',
            'attr_values' => '属性可选值',
            'attr_type' => '属性类型（0：参数；1：规格）',
            'sort' => '排序',
            'type_id' => '商品类型',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(GoodsType::className(), ['type_id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsAttrs()
    {
        return $this->hasMany(GoodsAttr::className(), ['attr_id' => 'attr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['goods_id' => 'goods_id'])->viaTable('{{%goods_attr}}', ['attr_id' => 'attr_id']);
    }


    /**
     * 装载默认值
     *
     * @param bool $skipIfSet
     * @return $this
     */
    public function loadDefaultValues($skipIfSet = true)
    {
        $this->type_id = Yii::$app->request->get('tid');
        return $this;
    }

    /**
     * 属性添加
     *
     * @return bool
     */
    public function createAttr()
    {
        if($this->load(Yii::$app->request->post()) && $this->validate())
        {
            return $this->save();
        }
        return false;
    }

    /**
     * 根据类型ID查找属性
     *
     * @param $tid
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAttr($tid)
    {
        $attr_list = ['attr'=>[],'spec'=>[]];
        $attrs = self::find()->select('attr_id,attr_name,attr_values,attr_type')->where('type_id=:tid',[':tid'=>$tid])->asArray()->all();
        foreach ($attrs as $key=>$value)
        {
            if(!empty($value['attr_values']))
            {
                $value['attr_values'] = explode("\r\n",$value['attr_values']);
            }
            if($value['attr_type'])
            {
                // 规格
                $attr_list['spec'][] = $value;
            }
            else
            {
                // 属性
                $attr_list['attr'][] = $value;
            }

        }
        return $attr_list;
    }
}
