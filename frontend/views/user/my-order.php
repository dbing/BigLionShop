<?php
/**
 * Created by PhpStorm.
 * @author: bing <itbing@sina.cn>
 * @DateTime: 2017/10/30 上午11:44
 *
 */


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
                    <th>订单状态</th>
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
                                <th>下单时间：<?=date('Y-m-d H:i:s',$order['create_time']);?></th>
                                <th>订单号： <?=$order['order_sn'];?></th>
                            </tr>
                            </thead>
                            <!-- 订单商品 -->
                            <tbody>
                            <?php if(is_array($order['order_goods']) && !empty($order['order_goods'])): foreach($order['order_goods'] as $goods):?>
                            <tr>
                                <td>
                                    <img src="<?=$goods['mini'];?>" alt="<?=$goods['goods_name'];?>" class="pull-left" class="img-thumbnail">
                                    <a href="<?=$goods['url'];?>" style="width:180px;"><?=$goods['goods_name'];?></a>

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
                        <p class="text-center">在线支付<br>(<?=$order['pay_name'];?>)</p>
                    </td>
                    <td>
                        <div class="center-block">
                            <a href="#">订单详情</a>
                        </div>
                        <div class="center-block">
                            <a href="javascript:shipping();" >查看物流</a>
                        </div>
                        <span class="label label-success">已完成</span><br>
                    </td>
                    <td>
                        <div class="center-block">
                            <a href="javascript:confirmRece();">取消订单</a>
                        </div>
                        <div class="center-block">
                            <a href="javascript:confirmRece();">确认收货</a>
                        </div>
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


    // 查询物流
    function shipping()
    {
        // 物流弹窗
        layer.open({
            title:'物流信息',
            type: 1,
            skin: 'demo-class', //样式类名
            closeBtn: 0, //不显示关闭按钮
            anim: 2,
            shadeClose: true, //开启遮罩关闭
            content: '<ul class="text-left" style="padding:10px;"><b>中通快递：458157653582</b>'
            +'<li>快件已从 深圳中心 发出2017-10-14 02:32:35</li>'
            +'<li>快件到达 深圳中心2017-10-14 02:30:14</li>'
            +'<li>快件到达 深圳中心2017-10-14 02:30:14</li>'
            +'<li>快件到达 深圳中心2017-10-14 02:30:14</li>'
            +'<li>快件到达 深圳中心2017-10-14 02:30:14</li></ul>'
        });
    }

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