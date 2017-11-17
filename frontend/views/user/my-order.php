<?php
/**
 * Created by PhpStorm.
 * @author: bing <itbing@sina.cn>
 * @DateTime: 2017/10/30 上午11:44
 *
 */

use common\models\OrderInfo;

use yii\bootstrap\Alert;
$alert = Yii::$app->session->getFlash('alert');

if(is_object($alert))
{
    echo Alert::widget([
        'options' => [
            'class' => $alert->code ? 'alert-success' : 'alert-danger',
        ],
        'body' => '<p class="text-center">'.$alert->msg.'</p>',
    ]);
}

?>

<style>
        /*表格列内容居中*/

    .table th, .table td {
        text-align: center;
        /*white-space: nowrap;*/
        vertical-align: middle!important;
    }
    /*物流弹出层样式定制*/
    body .demo-class .layui-layer-title{background:#E74C3C; color:#fff; border: none;}
    body .demo-class .layui-layer-btn{border-top:1px solid #E9E7E7}
    body .demo-class .layui-layer-btn a{background:#333;}
    body .demo-class .layui-layer-btn .layui-layer-btn1{background:#999;}
</style>


<br>
<div class="container">
    <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">
        <!-- 会员中心 -->
        <div class="widget">
            <div class="panel panel-default">
                <div class="panel-heading"><h5 class="border">会员中心</h5></div>
                <div class="panel-body">
                    <ul class="le-links">
                        <li><a href="#">用户信息</a></li>
                        <li><a href="#">我的收藏</a></li>
                        <li><a href="#">我的留言</a></li>
                        <li><a href="#">我的评论</a></li>
                    </ul><!-- /.le-links -->
                </div>
            </div>
        </div>

        <!-- 订单中心 -->
        <div class="widget">
            <div class="panel panel-default">
                <div class="panel-heading"><h5 class="border">订单中心</h5></div>
                <div class="panel-body">
                    <ul class="le-links">
                        <li><a href="my_order.html">我的订单</a></li>
                        <li><a href="#">收货地址</a></li>
                        <li><a href="#">缺货登记</a></li>
                    </ul><!-- /.le-links -->
                </div>
            </div>
        </div>

        <!-- 账号中心 -->
        <div class="widget">
            <div class="panel panel-default">
                <div class="panel-heading"><h5 class="border">账户中心</h5></div>
                <div class="panel-body">
                    <ul class="le-links">
                        <li><a href="#">账户安全</a></li>
                        <li><a href="#">资金管理</a></li>
                        <li><a href="#">我的红包</a></li>
                    </ul><!-- /.le-links -->
                </div>
            </div>
        </div>

    </div>

    <div class="col-xs-12 col-sm-9 ">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#">全部订单</a></li>
                    <li role="presentation"><a href="#">待付款<span class="badge">2</span></a></li>
                    <li role="presentation"><a href="#">待收货</a></li>
                    <li role="presentation"><a href="#">待评价<span class="badge">42</span></a></li>
                </ul>
            </div><!-- /.col-lg-6 -->

        </div><!-- /.row -->
        <hr>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>订单详情</th>
                    <th>收货人</th>
                    <th>订单总金额</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <!-- 单个订单开始处 -->
                <?php if(is_array($orderList) && !empty($orderList)): foreach($orderList as $order):?>
                <tr>
                    <td>
                        <table class="table">
                            <!-- 订单详情头信息 -->
                            <thead>
                            <tr>
                                <th>下单时间：<?=date('Y/m/d H:i:s',$order['create_time']);?></th>
                                <th>订单号： <?=$order['order_sn'];?></th>
                            </tr>
                            </thead>
                            <!-- 订单商品 -->
                            <tbody>
                            <?php if(is_array($order['order_goods']) && !empty($order['order_goods'])): foreach($order['order_goods'] as $goods):?>
                            <tr>
                                <td>
                                    <img src="<?=$goods['mini'];?>" alt="<?=$goods['goods_name'];?>" class="pull-left" class="img-thumbnail">
                                    <p style="width:190px;padding-left: 5px;text-align: left;overflow: hidden;white-space:normal;">
                                        <a href="<?=$goods['url'];?>"><?=$goods['goods_name'];?></a>
                                    </p>

                                </td>
                                <td>&#935;<?=$goods['buy_number'];?></td>
                            </tr>
                            <?php endforeach;endif;?>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <a href="" data-toggle="tooltip" data-placement="left" title="<?=$order['consignee'].$order['mobile'].$order['region'].$order['address'];?>"><?=$order['user_name'];?></a>
                    </td>
                    <td>
                        <p class="text-center">总额 <?=$order['format_order_amount'];?></p>
                        <p class="text-center">(<?=$order['pay_name'];?>)</p>
                    </td>
                    <td>
                        <?php if($order['shipping_status'] == OrderInfo::SHIP_SHIPED):?>
                        <div class="center-block">
                            <a href="javascript:void(0);" ship="<?=$order['shipping_name'];?>" data="<?=$order['invoice_no'];?>" class="query-express" >查看物流</a>
                        </div>
                        <?php endif;?>

                        <?php if($order['pay_status'] == OrderInfo::PAY_ERROR):?>
                            <span class="label label-default">未支付</span><p></p>
                        <?php elseif($order['pay_status'] == OrderInfo::PAY_SUCCESS):?>
                            <span class="label label-success">已支付</span><p></p>
                            
                        <?php endif;?>

                        <?php if($order['order_status'] == OrderInfo::ORDER_FINISH):?>
                            <span class="label label-success">已完成</span><p></p>
                        <?php elseif($order['order_status'] == OrderInfo::ORDER_CANCEL):?>
                            <span class="label label-default">已取消</span><p></p>
                        <?php elseif($order['order_status'] == OrderInfo::ORDER_UNCONFIRM):?>
                            <span class="label label-warning">待确认</span><p></p>
                        <?php elseif($order['order_status'] == OrderInfo::ORDER_CONFIRM):?>
                            <span class="label label-success">已确认</span><p></p>
                        <?php elseif($order['order_status'] == OrderInfo::ORDER_BRACE):?>
                            <span class="label label-danger">已作废</span><p></p>
                        <?php endif;?>

                    </td>
                    <td>
                        <div class="center-block">
                            <a href="#">订单详情</a>
                        </div>
                        <?php if($order['order_status'] == OrderInfo::ORDER_UNCONFIRM):?>
                        <div class="center-block">
                            <a href="javascript:confirmRece();">取消订单</a>
                        </div>
                        <?php endif;?>

                        <?php if($order['shipping_status'] == OrderInfo::SHIP_SHIPED):?>
                        <div class="center-block">
                            <a href="javascript:confirmRece();">确认收货</a>
                        </div>
                        <?php endif;?>
                        
                        <?php if($order['pay_status'] == OrderInfo::PAY_SUCCESS):?>
                            <span class="btn btn-default">退款</span><p></p>
                        <?php endif;?>

                        <?php if($order['shipping_status'] == OrderInfo::SHIP_SINGNED):?>
                        <div class="center-block">
                            <a href="#">评价</a>
                        </div>
                        <?php endif;?>
                    </td>
                </tr>
                <?php endforeach;endif;?>
                <!-- 单个订单结束处 -->


                </tbody>
            </table>
        </div> <!-- /.row -->

    </div>

</div><!-- /.container -->
</div><!-- /.single-product -->


<script>




    // 确认收货提示层
    function confirmRece()
    {

        layer.confirm('您是确定要这么做吗？', {
            btn: ['确定','再想想'] //按钮
        }, function(){
            layer.msg('操作成功.', {icon: 1});
        }, function(){
            layer.msg('哈哈，小贼再给你一次机会', {
                time: 20000, //20s后自动关闭
                btn: ['明白了', '知道了']
            });
        });
    }
</script>