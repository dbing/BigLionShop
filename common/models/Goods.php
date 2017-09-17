<?php

namespace common\models;

use backend\models\GoodsType;
use Yii;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property string $goods_id
 * @property string $goods_name
 * @property string $goods_sn
 * @property string $type_id
 * @property string $cat_id
 * @property string $brand_id
 * @property string $click_count
 * @property integer $goods_number
 * @property string $goods_weight
 * @property string $market_price
 * @property string $shop_price
 * @property integer $warn_number
 * @property string $goods_brief
 * @property string $goods_desc
 * @property string $goods_thumb
 * @property string $goods_img
 * @property integer $is_on_sale
 * @property integer $is_shipping
 * @property string $add_time
 * @property integer $sort
 * @property integer $is_delete
 * @property integer $is_best
 * @property integer $is_new
 * @property integer $is_hot
 * @property integer $last_update
 * @property integer $is_promote
 * @property string $promote_price
 * @property string $promote_start_date
 * @property string $promote_end_date
 *
 * @property Cart[] $carts
 * @property Brand $brand
 * @property Category $cat
 * @property GoodsType $type
 * @property GoodsAttr[] $goodsAttrs
 * @property Attribute[] $attrs
 * @property GoodsGallery[] $goodsGalleries
 * @property Product[] $products
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['goods_name', 'type_id', 'cat_id', 'brand_id', 'is_promote'], 'required'],
            [['type_id', 'cat_id', 'brand_id', 'click_count', 'goods_number', 'warn_number', 'is_on_sale', 'is_shipping', 'add_time', 'sort', 'is_delete', 'is_best', 'is_new', 'is_hot', 'last_update', 'is_promote', 'promote_start_date', 'promote_end_date'], 'integer'],
            [['goods_weight', 'market_price', 'shop_price', 'promote_price'], 'number'],
            [['goods_desc'], 'string'],
            [['goods_name'], 'string', 'max' => 60],
            [['goods_sn'], 'string', 'max' => 45],
            [['goods_brief'], 'string', 'max' => 255],
            [['goods_thumb', 'goods_img'], 'string', 'max' => 120],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'brand_id']],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['cat_id' => 'cat_id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => GoodsType::className(), 'targetAttribute' => ['type_id' => 'type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_id' => 'Goods ID',
            'goods_name' => '商品名称',
            'cat_id' => '分类',
            'brand_id' => '品牌',
            'click_count' => '点击量',
            'goods_number' => '库存',
            'goods_weight' => '重量',
            'market_price' => '市场价',
            'shop_price' => '本店家',
            'goods_brief' => '商品推广词',
            'goods_desc' => '商品详细描述',
            'goods_img' => 'Goods Img',
            'is_on_sale' => '上架',
            'add_time' => 'Add Time',
            'sort' => 'Sort',
            'is_best' => '精品',
            'is_new' => '新品',
            'is_hot' => '热销',
            'is_promote' => '促销',
            'promote_price' => '促销价',
            'promote_start_date' => '开始时间',
            'promote_end_date' => '结束时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['goods_id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['brand_id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::className(), ['cat_id' => 'cat_id']);
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
        return $this->hasMany(GoodsAttr::className(), ['goods_id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttrs()
    {
        return $this->hasMany(Attribute::className(), ['attr_id' => 'attr_id'])->viaTable('{{%goods_attr}}', ['goods_id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsGalleries()
    {
        return $this->hasMany(GoodsGallery::className(), ['goods_id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['goods_id' => 'goods_id']);
    }
}
