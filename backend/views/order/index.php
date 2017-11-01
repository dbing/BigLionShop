<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use common\models\OrderInfo;
?>

<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>订单列表</h3>
                <div class="span10 pull-right">
                    <input type="text" class="span5 search" placeholder="Type a user's name..." />

                    <div class="ui-dropdown">
                        <button class="btn">Search</button>
                    </div>

                    <a href="new-user.html" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        发布新商品
                    </a>
                </div>
            </div>

            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span2 sortable">
                            订单编号
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>收货人
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>订单状态
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>支付状态
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>配送状态
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>支付方式
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>订单金额
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>下单时间
                        </th>
                        <th class="span1 sortable align-right">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- row -->
                    <?php if(is_array($data['orderList'])): foreach ($data['orderList'] as $order):?>
                    <tr class="first">
                        <td>

                            <a href="" class="name"><?=$order['order_sn'];?></a>
                            <span class="subtext">订单留言xxx</span>
                        </td>
                        <td>
                            <?=$order['consignee'];?>
                        </td>
                        <td>
                            <?php if($order['order_status'] == OrderInfo::ORDER_UNCONFIRM):?>
                                <span class="label label-default">未确认</span>
                            <?php elseif($order['order_status'] == OrderInfo::ORDER_CONFIRM):?>
                                <span class="label label-warning">已确认</span>
                            <?php elseif($order['order_status'] == OrderInfo::ORDER_FINISH):?>
                                <span class="label label-success">已完成</span>
                            <?php elseif($order['order_status'] == OrderInfo::ORDER_CANCEL):?>
                                <span class="label label-danger">已取消</span>
                            <?php endif;?>
                        </td>
                        <td>
                            <?= ($order['pay_status']) ? '<span class="label label-success">已支付</span>' : '<span class="label label-default">未支付</span>';?>
                        </td>
                        <td>
                            
                            <?php if($order['shipping_status'] == OrderInfo::SHIP_UNSHIP):?>
                                <span class="label label-default">未发货</span>
                            <?php elseif($order['shipping_status'] == OrderInfo::SHIP_SHIPED):?>
                                <span class="label label-warning">已发货</span>
                            <?php elseif($order['shipping_status'] == OrderInfo::SHIP_SINGNED):?>
                                <span class="label label-success">已签收</span>
                            <?php endif;?>

                        </td>
                        <td>
                            <?=$order['pay_name'];?>
                        </td>
                        <td>
                            ￥<?=$order['order_amount'];?>
                        </td>
                        <td>
                            <?=date('Y/m/d H:i:s',$order['create_time']);?>
                        </td>
                        <td class="align-right">
                            <a href="<?= Url::to(['order/detail']);?>">查看</a> |
                            <a href="#">回收站</a>
                        </td>
                    </tr>
                    <?php endforeach;endif;?>
                    <!-- row -->




                    </tbody>
                </table>
            </div>
            <div class="pagination pull-right">
               <?= yii\widgets\LinkPager::widget(['pagination'=>$data['page']]);?>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->