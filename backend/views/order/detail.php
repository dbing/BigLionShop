<?php
/* @var $this yii\web\View */
use common\models\OrderInfo;
?>


<!-- main container -->
<div class="content">


    <div class="container-fluid">

        <div id="pad-wrapper">
            <?= $this->render('/common/message');?>

            <div class="row-fluid section btns">
                <!-- flat buttons -->
                <!-- these styles are located in css/elements.css -->
                <!-- they also include .small and .large classes to change their size -->
                <h4 class="title">订单信息</h4>
                <div class="span6">
                    <table class="table table-hover">
                        <tr>
                            <td><code>订单编号</code></td>
                            <td><?=$orderInfo['order_sn'];?></td>
                        </tr>
                        <tr>
                            <td><code>当前状态</code></td>
                            <td>
                                <?php if($orderInfo['order_status'] == OrderInfo::ORDER_UNCONFIRM):?>
                                    <span class="label label-default">未确认</span>
                                <?php elseif($orderInfo['order_status'] == OrderInfo::ORDER_CONFIRM):?>
                                    <span class="label label-warning">已确认</span>
                                <?php elseif($orderInfo['order_status'] == OrderInfo::ORDER_FINISH):?>
                                    <span class="label label-success">已完成</span>
                                <?php elseif($orderInfo['order_status'] == OrderInfo::ORDER_CANCEL):?>
                                    <span class="label label-danger">已取消</span>
                                <?php endif;?>
                            </td>
                        </tr>
                        <tr>
                            <td><code>支付状态</code></td>
                            <td>
                                <?= ($orderInfo['pay_status']) ? '<span class="label label-success">已支付</span>' : '<span class="label label-default">未支付</span>';?>
                            </td>
                        </tr>
                        <tr>
                            <td><code>配送状态</code></td>
                            <td>
                                <?php if($orderInfo['shipping_status'] == OrderInfo::SHIP_UNSHIP):?>
                                    <span class="label label-default">未发货</span>
                                <?php elseif($orderInfo['shipping_status'] == OrderInfo::SHIP_SHIPED):?>
                                    <span class="label label-warning">已发货</span>
                                <?php elseif($orderInfo['shipping_status'] == OrderInfo::SHIP_SINGNED):?>
                                    <span class="label label-success">已签收</span>
                                <?php endif;?>
                            </td>
                        </tr>

                    </table>
                </div>
                <!-- end flat buttons -->

                <!-- controls showcase -->
                <div class="span5">
                    <table class="table table-hover">
                        <tr >
                            <td>收货人</td>
                            <td><?=$orderInfo['consignee'];?></td>
                        </tr>
                        <tr>
                            <td>手机</td>
                            <td><?=$orderInfo['mobile'];?></td>
                        </tr>
                        <tr>
                            <td>邮编</td>
                            <td><?=$orderInfo['zipcode'];?></td>
                        </tr>
                        <tr >
                            <td>详细地址</td>
                            <td><?=$orderInfo['address'];?></td>
                        </tr>
                    </table>
                </div>
                <!-- end controls showcase -->
            </div>
            <div class="row-fluid section btns">
                <!-- glow buttons -->
                <!-- these styles are located in css/elements.css -->
                <!-- they also include .small and .large classes to change their size -->
                <h4 class="title">订单商品</h4>
                <div class="span11">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>商品编号</th>
                            <th>商品名</th>
                            <th>购买价</th>
                            <th>购买量</th>
                            <th>规格</th>
                        </tr>
                        </thead>
                        <!--BING提示循环开始处-->
                        <?php if(!empty($orderInfo['goods'])): foreach ($orderInfo['goods'] as $goods):?>
                        <tr class="first">
                            <td><?=$goods['goods_sn'];?></td>
                            <td><a href=""><?=$goods['goods_name'];?></a></td>
                            <td>￥<?=$goods['goods_price'];?></td>
                            <td><?=$goods['buy_number'];?></td>
                            <td><?=isset($goods['spec']) ? $goods['spec'] :'无规格';?></td>
                        </tr>
                        <?php endforeach;endif;?>
                        <!--BING提示循环结束处-->


                    </table>
                </div>
                <!-- end glow buttons -->

            </div>
            <div class="row-fluid section btns">
                <h4 class="title">订单操作日志</h4>
                <div class="span6">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>时间</th>
                            <th>操作人员</th>
                            <th>动作</th>
                            <th>结果</th>
                            <th>备注</th>
                        </tr>
                        </thead>
                        <!--BING提示循环开始处-->
                        <tr class="first">
                            <td>2017-3-9 22:36:51</td>
                            <td>BING</td>
                            <td>作废</td>
                            <td>成功</td>
                            <td>订单【20160906214326805294】作废成功</td>
                        </tr>
                        <!--BING提示循环结束处-->
                        <tr class="first">
                            <td>2017-3-9 22:36:51</td>
                            <td>BING</td>
                            <td>确认</td>
                            <td>成功</td>
                            <td>订单【20160906214326805294】确认成功</td>
                        </tr>
                        <tr class="first">
                            <td>2017-3-9 22:36:51</td>
                            <td>BING</td>
                            <td>发货</td>
                            <td>成功</td>
                            <td>订单【20160906214326805294】发货成功</td>
                        </tr>

                    </table>
                </div>
                <div class="span4 pull-right">
                    <a href="<?=\yii\helpers\Url::to(['order/confirm','oid'=>$orderInfo['order_id']])?>" class="btn-flat">确认订单</a>

                    <a href="<?=\yii\helpers\Url::to(['order/cancel','oid'=>$orderInfo['order_id']])?>" class="btn-flat">取消订单</a>

                    <a href="<?=\yii\helpers\Url::to(['order/ship','oid'=>$orderInfo['order_id']])?>" class="btn-flat">去发货</a>

                    <a href="<?=\yii\helpers\Url::to(['order/pay','oid'=>$orderInfo['order_id']])?>" class="btn-flat">支付</a>

                </div>
            </div>
            <div class="separator">

            </div>
            <!-- custom dialogs -->

        </div>
        <!-- end custom dialogs -->


    </div>
</div>

<!-- end main container -->
