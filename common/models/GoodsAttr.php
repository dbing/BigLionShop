<?php

namespace common\models;

use Yii;
use yii\base\Exception;

/**
 * This is the model class for table "{{%goods_attr}}".
 *
 * @property string $goods_attr_id
 * @property string $goods_id
 * @property integer $attr_id
 * @property string $attr_value
 *
 * @property Attribute $attr
 * @property Goods $goods
 */
class GoodsAttr extends \yii\db\ActiveRecord
{

    const IS_ATTR = 0;  // 属性
    const IS_SPEC = 1;  // 规格

    public $attrValueErr = null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods_attr}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'attr_id'], 'required'],
            [['goods_id', 'attr_id'], 'integer'],
            [['attr_value'], 'string', 'max' => 120],
            [['attr_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attribute::className(), 'targetAttribute' => ['attr_id' => 'attr_id']],
            [['goods_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['goods_id' => 'goods_id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_attr_id' => 'Goods Attr ID',
            'goods_id' => 'Goods ID',
            'attr_id' => 'Attr ID',
            'attr_value' => '属性值',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttr()
    {
        return $this->hasOne(Attribute::className(), ['attr_id' => 'attr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasOne(Goods::className(), ['goods_id' => 'goods_id']);
    }

    /**
     * 根据商品 ID 查询规格
     *
     * @param $gid
     * @return array|null
     */
    public function getAttribute($gid)
    {
        $result = ['spec'=>[],'attr'=>[],'type_id'=>''];
        $attributes = self::find('goods_attr_id','attr_value')->where(['goods_id'=>$gid])->all();

        if(!empty($attributes))
        {
            foreach ($attributes as $key=>$value)
            {
                $result['type_id'] = $value->attr->type_id;

                if($value->attr->attr_type == self::IS_SPEC)
                {

                    $result['spec'][$value->attr->attr_name][$value['goods_attr_id']] = $value['attr_value'];
                }
                else
                {
                    $result['attr'][$key]['goods_attr_id'] = $value['goods_attr_id'];
                    $result['attr'][$key]['attr_name'] = $value->attr->attr_name;
                    $result['attr'][$key]['attr_value'] = $value['attr_value'];

                }

            }
            return $result;
        }
        return null;
    }

    /**
     * 商品属性入库
     *
     * @param $gid
     * @param $data
     */
    public function createAllGoodsAttr($gid,$data)
    {
        $temp = ['goods_id'=>$gid,'attr_id'=>'','attr_value'=>''];
        $transaction = Yii::$app->db->beginTransaction();
        try
        {
            foreach ($data as $key=>$value)
            {
                if(!empty($value) && is_array($value))
                {
                    foreach ($value as $val)
                    {
                        $temp['attr_id'] = $key;
                        $temp['attr_value'] = $val;

                        // 规格入库
                        if(!$this->createOneGoodsAttr($temp))
                        {
                            throw new Exception('规格添加失败.'.$this->attrValueErr);
                        }
                    }

                }
                else if(!empty($value) && !is_array($value))
                {
                    $temp['attr_id'] = $key;
                    $temp['attr_value'] = $value;
                    // 属性入库
                    if(!$this->createOneGoodsAttr($temp))
                    {
                        throw new Exception('属性添加失败.'.$this->attrValueErr);
                    }
                }
            }
            $transaction->commit();
        }
        catch (Exception $e)
        {
            $transaction->rollBack();
            throw  new Exception($e->getMessage());
        }
        return true;
    }

    /**
     * 单个商品规格属性入库
     *
     * @param $row
     * @return bool
     */
    public function createOneGoodsAttr($row)
    {
        if(!self::find()->where($row)->one())
        {
            $goodsAttr =(new GoodsAttr());
            $goodsAttr->load(['GoodsAttr'=>$row]);
            if(!$goodsAttr->save())
            {
                $this->attrValueErr = $goodsAttr->getFirstError('attr_value');
                return false;
            }

        }
        return true;
    }


    /**
     * 查询商品规格
     *
     * @param $attrList
     * @return string
     */
    static public function getFormatSpec($attrList)
    {

        if(!empty($attrList))
        {
            $goodAttr = self::findAll(json_decode($attrList,true));

            if(!is_null($goodAttr))
            {
                $spec = '';
                foreach ($goodAttr as $key=>$value)
                {
                    $spec .= $value->attr->attr_name .':'.$value->attr_value.'<br>';
                }
                return $spec;
            }
            else
            {
                return null;
            }
        }
        else
        {
            return null;
        }
    }

}
