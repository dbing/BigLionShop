<?php

namespace common\models;

use backend\models\OrderAction;
use backend\models\Shipping;
use common\helpers\Tools;
use frontend\components\AjaxReturn;
use frontend\models\Region;
use frontend\models\User;
use Yii;
use yii\base\Exception;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "{{%order_info}}".
 *
 * @property integer $order_id
 * @property string $order_sn
 * @property integer $order_status
 * @property integer $shipping_status
 * @property integer $pay_status
 * @property string $message
 * @property string $pay_name
 * @property string $shipping_name
 * @property string $goods_amount
 * @property string $shipping_fee
 * @property string $money_paid
 * @property string $order_amount
 * @property integer $create_time
 * @property integer $confirm_time
 * @property integer $pay_time
 * @property integer $shipping_time
 * @property string $consignee
 * @property integer $country
 * @property integer $province
 * @property integer $city
 * @property integer $district
 * @property string $address
 * @property string $zipcode
 * @property string $mobile
 * @property string $user_id
 * @property integer $pay_id
 * @property integer $shipping_id
 * @property string $invoice_no
 *
 * @property OrderAction[] $orderActions
 * @property OrderGoods[] $orderGoods
 * @property Shipping $shipping
 * @property User $user
 */
class OrderInfo extends \yii\db\ActiveRecord
{
    public $goods;

    const ORDER_UNCONFIRM = 0;  //
    const ORDER_CONFIRM = 1;
    const ORDER_FINISH = 2;
    const ORDER_CANCEL = 3;
    const ORDER_BRACE = 4;
    const ORDER_RETURN = 5;

    const PAY_SUCCESS = 1;
    const PAY_ERROR = 0;

    const SHIP_UNSHIP = 0;
    const SHIP_SHIPED = 1;
    const SHIP_SINGNED = 2;



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_status', 'shipping_status', 'pay_status', 'create_time', 'confirm_time', 'pay_time', 'shipping_time', 'country', 'province', 'city', 'district', 'user_id', 'pay_id'], 'integer'],
            [['goods_amount', 'shipping_fee', 'money_paid', 'order_amount','shipping_id'], 'number'],
            [['user_id', 'pay_id'], 'required'],
            [['order_sn', 'mobile'], 'string', 'max' => 20],
            [['message', 'address'], 'string', 'max' => 120],
            [['pay_name', 'shipping_name'], 'string', 'max' => 60],
            [['remarks'], 'string', 'max' => 255],
            [['consignee', 'invoice_no'], 'string', 'max' => 45],
            [['zipcode'], 'string', 'max' => 6],
            [['order_sn'], 'unique'],
            //[['shipping_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shipping::className(), 'targetAttribute' => ['shipping_id' => 'shipping_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_sn' => '订单编号',
            'order_status' => '订单状态(0未确认,1确认,2已完成,3已取消,4无效,5退货 )',
            'shipping_status' => '商品配送情况;(0未发货,1已发货,2已签收,3配货中，4退货 )',
            'pay_status' => '支付状态;0未付款;1已付款 ',
            'message' => '订单附言,由用户提交订单前填写',
            'pay_name' => '支付方式',
            'shipping_name' => '配送方式',
            'goods_amount' => '商品总金额',
            'shipping_fee' => '配送费用',
            'money_paid' => '已付金额',
            'order_amount' => '应付款金额 ',
            'create_time' => '创建时间',
            'confirm_time' => '订单确认时间',
            'pay_time' => '支付时间',
            'shipping_time' => '发货时间',
            'consignee' => '收货人的姓名',
            'country' => '收货人的国家,用户页面填写,默认取值于表user_address,其id对应的值在region',
            'province' => '收货人的省份,用户页面填写,默认取值于表user_address, 其id对应的值在region',
            'city' => '收货人的城市,用户页面填写,默认取值于表user_address,其id对应的值在region',
            'district' => '收货人的地区,用户页面填写,默认取值于表user_address,其id对应的值在region',
            'address' => '收货人的详细地址,用户页面填写,默认取值于表user_address ',
            'zipcode' => '收货人的邮编,用户页面填写,默认取值于表user_address',
            'mobile' => '收货人的手机,用户页面填写,默认取值于表user_address',
            'user_id' => 'User ID',
            'pay_id' => '支付方式ID',
            'shipping_id' => '配送方式',
            'invoice_no' => '发货单号',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderActions()
    {
        return $this->hasMany(OrderAction::className(), ['order_id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGoods()
    {
        return $this->hasMany(OrderGoods::className(), ['order_id' => 'order_id']);
    }

    /**
     * 订单操作日志
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAction()
    {

        return $this->hasMany(OrderAction::className(),['order_id'=>'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShipping()
    {
        return $this->hasOne(Shipping::className(), ['shipping_id' => 'shipping_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * 生产货号
     *
     * @return string
     */
    static public function createOrderSn()
    {
        /*
            201608231151572285
            2016082311 51 57 2285-1
            2016082311 51 57 2285-2
        */

        $sn = date('YmdHis') . rand(1000,9999);
        if(self::find()->where(['order_sn'=>$sn])->count() > 0)
        {
            return self::createOrderSn();
        }
        return $sn;
    }

    public function beforeValidate()
    {
        $this->create_time = time();
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }

    /**
     * 创建订单
     *
     * @param $data
     */
    public function createOrder($data)
    {
        if($this->load(['OrderInfo'=>$data]) && $this->validate())
        {
            $transaction = Yii::$app->db->beginTransaction();
            try
            {
                // 入库订单
                $res = $this->save();
                if(!$res)
                {
                    throw new Exception('订单添加失败');
                }
                // 自增订单ID
                // $orderId = Yii::$app->db->getLastInsertID();
                $orderId = $this->primaryKey;

                // 入订单商品
                $res = (new OrderGoods)->createOrderGoods($data['goodsList'],$orderId);
                if(!$res)
                {
                    throw new Exception('订单商品添加失败');
                }

                $transaction->commit();
                // $this->order_amount
                $payUrl = Yii::$app->alipay->payUrl($this->order_sn,'必应商城订单',0.11,'必应商城的商品');
                return (new AjaxReturn(AjaxReturn::SUCCESS,'操作成功.',['url'=>$payUrl]))->returned();

            }
            catch (Exception $e)
            {
                $transaction->rollBack();
                return (new AjaxReturn(AjaxReturn::ERROR,$e->getMessage()))->returned();
            }

        }
        else
        {

            return (new AjaxReturn(AjaxReturn::ERROR,$this->getFirstErrors()))->returned();
        }
    }


    /**
     * 跟新订单支付状态
     *
     * @param $orderSn
     * @param $totalFee
     * @return bool
     */
    static function updateOrder($orderSn,$totalFee)
    {
        $order = self::findOne(['order_sn'=>$orderSn]);
        if(!is_null($order))
        {
            // 判断该笔订单是否处理过
            if($order->pay_status == self::PAY_SUCCESS) return true;

            $order->pay_status = self::PAY_SUCCESS;
            $order->money_paid = $totalFee;
            $order->pay_time = time();
            return $order->save();

        }
        else
        {
            return false;
        }
    }


    /**
     * 查询我的订单列表
     *
     * @param $userId
     * @return array
     */
    static function getMyOrder($userId)
    {
        $result = [];
        $myOrderList = self::findAll(['user_id'=>$userId]);
        //var_dump($myOrderList);
        if(!is_null($myOrderList))
        {
            $up = new UploadForm();
            foreach ($myOrderList as $key=>$order)
            {
                $result[$key] = ArrayHelper::toArray($order);
                // 处理地区
                $result[$key]['region'] = Region::getRegionName([$order['country'],$order['province'],$order['city'],$order['district']]);
                // 处理金额
                $result[$key]['format_order_amount'] = Tools::formatMoney($order['order_amount']);
                // 查询会员名
                $result[$key]['user_name'] = $order->user->username;
                // 查询订单商品
                $temp = $order->orderGoods;

                if(is_array($temp) && !empty($temp))
                {
                    $orderGoods = [];
                    foreach ($temp as $k=>$v)
                    {
                        $orderGoods[$k]['goods_name'] = $v->goods_name;
                        $orderGoods[$k]['buy_number'] = $v->buy_number;
                        $orderGoods[$k]['url'] = Tools::buildUrl(['product/index',$v->goods_id]);

                        if(isset($v->goods->goods_img) && !empty($v->goods->goods_img))
                        {
                            $orderGoods[$k]['mini'] = $up->getDownloadUrl($v->goods->goods_img,'mini');

                        }
                    }
                }
                $result[$key]['order_goods'] = $orderGoods;

            }
        }

        return $result;
    }


    /**
     * 查询后台订单列表
     *
     * @return array
     */
    static function getOrderList()
    {
        $query = self::find();
        $page = new Pagination(['totalCount'=>$query->count(),'defaultPageSize'=>Yii::$app->params['pageSize']]);
        
        $orderList = $query->select('order_id,order_sn,order_status,pay_status,consignee,shipping_status,pay_name,order_amount,create_time')
            ->asArray()
            ->orderBy('order_id DESC')
            ->offset($page->offset)
            ->limit($page->limit)
            ->all();

        return ['page'=>$page,'orderList'=>$orderList];
    }

    /**
     * 查询订单详情
     *
     * @param $id
     * @return array|null
     */
    static function getOrderInfo($id)
    {
        $result = [];
        $info = self::findOne($id);

        if(!is_null($info))
        {
            $result = ArrayHelper::toArray($info);
            $result['address'] = Region::getRegionName([$info['country'],$info['province'],$info['city'],$info['district']]) . $info['address'];
            $tempGoods = ArrayHelper::toArray($info->orderGoods);
            if(!is_null($tempGoods))
            {
                foreach ($tempGoods as $key=>$goods)
                {
                    if(!empty($goods['attr_list']))
                    {
                        $tempGoods[$key]['spec'] = GoodsAttr::getFormatSpec($goods['attr_list']);
                    }
                }
            }
            $result['goods'] = $tempGoods;
            $result['action'] = ArrayHelper::toArray($info->action);
            return $result;
        }
        else
        {
            return null;
        }
    }


    /**
     * 确认订单
     *
     * @param $orderId
     * @return bool|null
     */
    static function confirmOrder($orderId)
    {
        $order = self::findOne($orderId);
        if(is_null($order))
        {
            return null;
        }
        else
        {
            $order->order_status = self::ORDER_CONFIRM;
            $order->confirm_time = time();
            return $order->save();
        }
    }

    /**
     * 操作支付
     *
     * @param $orderId
     * @return bool|null
     */
    static function payOrder($orderId)
    {
        $order = self::findOne($orderId);
        if(is_null($order))
        {
            return null;
        }
        else
        {
            $order->pay_status = self::PAY_SUCCESS;
            $order->pay_time = time();
            $order->money_paid = $order->order_amount;
            return $order->save();
        }
    }
}
