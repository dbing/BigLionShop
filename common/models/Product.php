<?php

namespace common\models;

use common\helpers\Tools;
use Yii;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property string $product_id
 * @property integer $product_num
 * @property string $product_price
 * @property string $product_sn
 * @property string $attr_list
 * @property string $goods_id
 *
 * @property Goods $goods
 */
class Product extends \yii\db\ActiveRecord
{

    const CLASS_NAME = 'Product';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_num', 'goods_id'], 'integer'],
            [['product_price'], 'number'],
            [['goods_id'], 'required'],
            [['product_sn'], 'string', 'max' => 45],
            [['attr_list'], 'string', 'max' => 80],
            [['goods_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['goods_id' => 'goods_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_num' => '货品库存',
            'product_price' => 'Product Price',
            'product_sn' => 'Product Sn',
            'attr_list' => 'Attr List',
            'goods_id' => 'Goods ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasOne(Goods::className(), ['goods_id' => 'goods_id']);
    }

    public function getProducts($gid)
    {
        $products = self::findAll(['goods_id'=>$gid]);
        if(!empty($products))
        {
            $products = ArrayHelper::toArray($products);
            foreach ($products as $key=>$value)
            {
                $temp = json_decode($value['attr_list'],true);
                $specs = GoodsAttr::find()->select('attr_value')->where(['in','goods_attr_id',$temp])->asArray()->all();

                $products[$key]['attr_list_val'] = array_column($specs,'attr_value');

            }
            return $products;
        }
        return null;
    }

    /**
     * 货品组合入库
     *
     * @param $rows
     * @param $gid
     * @return bool
     * @throws Exception
     */
    public function createProduct($rows,$gid)
    {

        foreach ($rows as $key=>$value)
        {
            $value['goods_id'] = $gid;
            $value['attr_list'] = json_encode($value['attr_list']);
            if(empty($value['product_sn']))
            {
                $value['product_sn'] = Tools::createGoodsSn();
            }
            // 如果已经存则跳过入库
            if(self::findAll(['goods_id'=>$gid,'attr_list'=>$value['attr_list']]))
            {
                continue;
            }
            $product = new self();
            if($product->load([self::CLASS_NAME=>$value]) && $product->validate())
            {
                if(!$product->save())
                {
                   throw new Exception('货品入库失败.');
                }
            }
            else
            {
                throw new Exception('货品信息不合格.'.$product->getErrors());
            }
        }
        return true;
    }
}
