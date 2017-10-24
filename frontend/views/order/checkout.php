<?php
/* @var $this yii\web\View */
?>
<!-- ========================================= CONTENT ========================================= -->

    <section id="checkout-page">
        <div class="container">
            <div class="col-xs-12 no-margin">

                <section id="shipping-address">
                    <h2 class="border h1">收货人信息</h2>

                    <?php if(!empty($address)): foreach ($address as $value):?>
                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-2">
                            <input class="le-radio" type="radio" name="address" value="<?=$value['address_id'];?>">
                            <div class="radio-label bold "> <?=$value['address_name'];?> </div>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <div class="radio-label bold ">收货人： <?=$value['consignee'];?> </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="radio-label bold ">地址： <?=$value['region_name'].$value['address'];?> </div>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <div class="radio-label bold "> <?=$value['mobile'];?> </div>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <div class="radio-label bold "><a href="">修改</a>  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </div>
                        </div>
                    </div><!-- /.field-row -->
                    <?php endforeach;endif;?>

                </section><!-- /#shipping-address -->


                <section id="your-order">
                    <h2 class="border h1">订单信息</h2>
                    <form>
                        <?php if(is_array($cart['goodsList'])): foreach ($cart['goodsList'] as $goods): ?>
                        <div class="row no-margin order-item">
                            <div class="col-xs-12 col-sm-1 no-margin">
                                <a href="#" class="qty"><?=$goods['buy_number'];?> x</a>
                            </div>

                            <div class="col-xs-12 col-sm-9 ">
                                <div class="title"><a href="<?=$goods['url'];?>"><?=$goods['goods_name'];?> </a></div>
                                <div class="brand"><?=$goods['brand_name'];?></div>
                            </div>

                            <div class="col-xs-12 col-sm-2 no-margin">
                                <div class="price"><?=$goods['format_goods_price'];?></div>
                            </div>
                        </div><!-- /.order-item -->
                        <?php endforeach;endif;?>

                    </form>
                </section><!-- /#your-order -->

                <div id="total-area" class="row no-margin">
                    <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                        <div id="subtotal-holder">
                            <ul class="tabled-data inverse-bold no-border">
                                <li>
                                    <label>商品总金额</label>
                                    <div class="value "><?=$cart['format_goods_amount'];?></div>
                                </li>
                                <li>
                                    <label>运费</label>
                                    <div class="value">
                                        <?=$cart['format_ship_fee'];?>
                                        <!--
                                        <div class="radio-group">
                                            <input class="le-radio" type="radio" name="group1" value="free"> <div class="radio-label bold">free shipping</div><br>
                                            <input class="le-radio" type="radio" name="group1" value="local" checked>  <div class="radio-label">local delivery<br><span class="bold">$15</span></div>
                                        </div>
                                        -->
                                    </div>
                                </li>
                            </ul><!-- /.tabled-data -->

                            <ul id="total-field" class="tabled-data inverse-bold ">
                                <li>
                                    <label>订单总金额</label>
                                    <div class="value"><?=$cart['format_order_amount'];?></div>
                                </li>
                            </ul><!-- /.tabled-data -->

                        </div><!-- /#subtotal-holder -->
                    </div><!-- /.col -->
                </div><!-- /#total-area -->

                <div id="payment-method-options">
                    <form>
                        <?php if(is_array($paies) && !empty($paies)): foreach ($paies as $pay):?>
                        <div class="payment-method-option">
                            <input class="le-radio" type="radio" name="pay" value="<?=$pay['pay_id'];?>">
                            <div class="radio-label bold "><?=$pay['pay_name'];?><br>
                                <p><?=$pay['pay_desc'];?></p>
                            </div>
                        </div><!-- /.payment-method-option -->
                        <?php endforeach;endif;?>

                    </form>
                </div><!-- /#payment-method-options -->

                <div class="place-order-button">
                    <button class="le-button big submit_order">提交订单</button>
                </div><!-- /.place-order-button -->

            </div><!-- /.col -->
        </div><!-- /.container -->
    </section><!-- /#checkout-page -->
    <!-- ========================================= CONTENT : END ========================================= -->