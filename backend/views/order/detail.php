<?php
/* @var $this yii\web\View */
?>


<!-- main container -->
<div class="content">

    <!-- settings changer -->
    <div class="skins-nav">
        <a href="#" class="skin first_nav selected">
            <span class="icon"></span><span class="text">Default</span>
        </a>
        <a href="#" class="skin second_nav" data-file="css/skins/dark.css">
            <span class="icon"></span><span class="text">Dark skin</span>
        </a>
    </div>

    <div class="container-fluid">

        <div id="pad-wrapper">
            <div class="row-fluid section btns">
                <!-- flat buttons -->
                <!-- these styles are located in css/elements.css -->
                <!-- they also include .small and .large classes to change their size -->
                <h4 class="title">订单信息</h4>
                <div class="span6">
                    <table class="table table-hover">
                        <tr>
                            <td><code>订单编号</code></td>
                            <td>20170307213643289788</td>
                        </tr>
                        <tr>
                            <td><code>当前状态</code></td>
                            <td>已取消</td>
                        </tr>
                        <tr>
                            <td><code>支付状态</code></td>
                            <td>未支付</td>
                        </tr>
                        <tr>
                            <td><code>配送状态</code></td>
                            <td>已发货</td>
                        </tr>

                    </table>
                </div>
                <!-- end flat buttons -->

                <!-- controls showcase -->
                <div class="span5">
                    <table class="table table-hover">
                        <tr >
                            <td>收货人</td>
                            <td>BING</td>
                        </tr>
                        <tr>
                            <td>手机</td>
                            <td>12345678901</td>
                        </tr>
                        <tr>
                            <td>email</td>
                            <td>itbing@sina.cn</td>
                        </tr>
                        <tr >
                            <td>详细地址</td>
                            <td>Sign up now</td>
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
                            <th>商品原价</th>
                            <th>购买价</th>
                            <th>购买量</th>
                            <th>规格</th>
                        </tr>
                        </thead>
                        <!--BING提示循环开始处-->
                        <tr class="first">
                            <td>12345678901</td>
                            <td><a href="">新西兰原装进口牛奶 安佳Anchor全脂牛奶UHT纯牛奶1L*12 整箱装</a></td>
                            <td>998￥</td>
                            <td>198￥</td>
                            <td>100</td>
                            <td>白色 XL</td>
                        </tr>
                        <!--BING提示循环结束处-->
                        <tr >
                            <td>12345678901</td>
                            <td><a href="">新西兰原装进口牛奶 安佳Anchor全脂牛奶UHT纯牛奶1L*12 整箱装</a></td>
                            <td>998￥</td>
                            <td>198￥</td>
                            <td>100</td>
                            <td>白色 XL</td>
                        </tr>
                        <tr >
                            <td>12345678901</td>
                            <td><a href="">新西兰原装进口牛奶 安佳Anchor全脂牛奶UHT纯牛奶1L*12 整箱装</a></td>
                            <td>998￥</td>
                            <td>198￥</td>
                            <td>100</td>
                            <td>白色 XL</td>
                        </tr>

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
                <div class="span3 pull-right">
                    <a class="btn-flat">取消订单</a>
                    <a class="btn-flat">去发货</a>
                    <a class="btn-flat">支付</a>
                </div>
            </div>
            <div class="separator">

            </div>
            <!-- custom dialogs -->

        </div>
        <!-- end custom dialogs -->

        <div class="separator"></div>
        <div class="section">
            <!-- alerts -->
            <h4 class="title">Alerts</h4>
            <div class="row-fluid">
                <div class="span6">
                    <div class="alert alert-info">
                        <i class="icon-exclamation-sign"></i>
                        Do you want to get these resources for as little as $0.70 each?
                    </div>
                    <div class="alert alert-success">
                        <i class="icon-ok-sign"></i> Your order has been placed.
                    </div>
                </div>
                <div class="span6">
                    <div class="alert">
                        <i class="icon-warning-sign"></i>
                        Password strength is low.
                    </div>
                    <div class="alert alert-error">
                        <i class="icon-remove-sign"></i>
                        Unexpected error. Please try again later.
                    </div>
                </div>
            </div>
            <!-- end alerts -->
        </div>
    </div>
</div>

<!-- end main container -->
