<?php

namespace common\models;

use backend\models\GoodsType;
use common\helpers\Tools;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

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

    const IS_PROMOTE = 1;           // 促销
    const IS_NOT_PROMOTE = 0;       // 不促销
    const IS_NOT_DELETE = 0;        // 回收站
    const IS_ON_SALE = 1;           // 上架

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
            [['goods_name', 'cat_id', 'brand_id', 'is_promote'], 'required'],
            [['cat_id', 'brand_id', 'click_count', 'goods_number', 'warn_number', 'is_on_sale', 'is_shipping', 'add_time', 'sort', 'is_delete', 'is_best', 'is_new', 'is_hot', 'last_update', 'is_promote', 'promote_start_date', 'promote_end_date'], 'integer'],
            [['goods_weight', 'market_price', 'shop_price', 'promote_price'], 'number'],
            [['goods_desc'], 'string'],
            [['goods_name'], 'string', 'max' => 255],
            [['goods_sn'], 'string', 'max' => 45],
            [['goods_brief'], 'string', 'max' => 255],
            [['goods_thumb', 'goods_img'], 'string', 'max' => 120],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'brand_id']],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['cat_id' => 'cat_id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
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


    public function beforeValidate()
    {
        if(parent::beforeValidate())
        {
            if(!empty($this->promote_price))
            {
                $this->is_promote = self::IS_PROMOTE;
            }

            // 生成货号
            $this->goods_sn = Tools::createGoodsSn();
            // 处理促销时间
            $this->promote_start_date = strtotime($this->promote_start_date);
            $this->promote_end_date = strtotime($this->promote_end_date);
            $this->add_time = time();
            return true;
        }
        return false;
    }

    /**
     * 商品添加
     *
     * @return bool
     */
    public function createGoods()
    {

        if($this->load(Yii::$app->request->post()) && $this->validate())
        {
            return $this->save(false);
        }
        return false;
    }


    /**
     * 查询推荐商品
     *
     * @param string $type
     * @param int $offset
     * @param int $limit
     * @return array
     */
    static public function getRecommendGoods($type='is_best',$offset=0,$limit=4)
    {
        if(!in_array($type,['is_best','is_new','is_hot']))
        {
            return [];
        }

        $query = self::find()
            ->select('goods_id,goods_name,market_price,shop_price,brand_id,goods_img,is_new,is_hot,is_best')
            ->where(['is_on_sale'=>self::IS_ON_SALE,'is_delete'=>self::IS_NOT_DELETE,$type=>1,'is_promote'=>self::IS_NOT_PROMOTE])
            ->all();

        $result = [];
        if(is_array($query))
        {
            $upload = (new UploadForm());
            foreach ($query as $key=>$value)
            {
                $result[$key] = ArrayHelper::toArray($value);
                $result[$key]['brand_name'] = $value->brand->brand_name;
                $result[$key]['discount'] = ceil(($value['shop_price'] / $value['market_price'])*100).'%';
                $result[$key]['thumb'] = $upload->getDownloadUrl($value['goods_img'],'recommend');
                $result[$key]['shop_price'] = Tools::formatMoney($value['shop_price']);
                $result[$key]['market_price'] = Tools::formatMoney($value['market_price']);
                $result[$key]['url'] = Tools::buildUrl(['product/index','gid'=>$value['goods_id']]);

            }

        }

        return $result;
    }
}
