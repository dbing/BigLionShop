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
                <tr>
                    <td>
                        <table class="table">
                            <!-- 订单详情头信息 -->
                            <thead>
                            <tr>
                                <th>下单时间：2017-08-21 23:13:49</th>
                                <th>订单号： 60395972701</th>
                            </tr>
                            </thead>
                            <!-- 订单商品 -->
                            <tbody>
                            <tr>
                                <td style="text-align:left;">
                                    <img src="assets/images/products/gallery-thumb-01.jpg" alt="..." class="pull-left" class="img-thumbnail">
                                    <a href="#" class="pull-left" style="width:250px;margin-left:5px;">新美心（maxin ）M3无线鼠标键盘M3无线鼠标键盘</a>

                                </td>
                                <td>&#935;2</td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <img src="assets/images/products/gallery-thumb-01.jpg" alt="..." class="pull-left" class="img-thumbnail">
                                    <a href="#" class="pull-left" style="width:250px;margin-left:5px;">新美心（maxin ）M3无线鼠标键盘M3无线鼠标键盘</a>

                                </td>
                                <td>&#935;1</td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <img src="assets/images/products/gallery-thumb-01.jpg" alt="..." class="pull-left" class="img-thumbnail">
                                    <a href="#" class="pull-left" style="width:250px;margin-left:5px;">新美心（maxin ）M3无线鼠标键盘M3无线鼠标键盘</a>

                                </td>
                                <td>&#935;1</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <a href="" data-toggle="tooltip" data-placement="left" title="丁冰 13641131494 北京昌平区六环以内沙河镇 万家创业园 C区 7203">Mark</a>
                    </td>
                    <td>
                        <p class="text-center">总额 ¥1490.00</p>
                        <p class="text-center">在线支付<br>(支付宝)</p>
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
                <!-- 单个订单结束处 -->

                <!-- 单个订单开始处 -->
                <tr>
                    <td>
                        <table class="table">
                            <!-- 订单详情头信息 -->
                            <thead>
                            <tr>
                                <th>下单时间：2017-08-21 23:13:49</th>
                                <th>订单号： 60395972701</th>
                            </tr>
                            </thead>
                            <!-- 订单商品 -->
                            <tbody>
                            <tr>
                                <td style="text-align:left;">
                                    <img src="assets/images/products/gallery-thumb-01.jpg" alt="..." class="pull-left" class="img-thumbnail">
                                    <a href="#" class="pull-left" style="width:250px;margin-left:5px;">新美心（maxin ）M3无线鼠标键盘M3无线鼠标键盘</a>

                                </td>
                                <td>&#935;2</td>
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    <img src="assets/images/products/gallery-thumb-01.jpg" alt="..." class="pull-left" class="img-thumbnail">
                                    <a href="#" class="pull-left" style="width:250px;margin-left:5px;">新美心（maxin ）M3无线鼠标键盘M3无线鼠标键盘</a>

                                </td>
                                <td>&#935;1</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <a href="" data-toggle="tooltip" data-placement="left" title="丁冰 13641131494 北京昌平区六环以内沙河镇 万家创业园 C区 7203">Mark</a>
                    </td>
                    <td>
                        <p class="text-center">总额 ¥1490.00</p>
                        <p class="text-center">在线支付<br>(支付宝)</p>
                    </td>
                    <td>
                        <div class="center-block">
                            <a href="#">订单详情</a>
                        </div>
                        <span class="label label-default">已关闭</span><br>
                    </td>
                    <td><a href="">评价</a></td>
                </tr>
                <!-- 单个订单结束处 -->
                </tbody>
            </table>
        </div> <!-- /.row -->

    </div>

</div><!-- /.container -->
</div><!-- /.single-product -->
