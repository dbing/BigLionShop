<?php
/* @var $this yii\web\View */
?>
<section id="cart-page">
        <div class="container">
            <!-- ========================================= CONTENT ========================================= -->
            <?php if(is_array($cart['goodsList'])&&!empty($cart['goodsList'])): ?>
            <div class="col-xs-12 col-md-9 items-holder no-margin">

                <?php foreach ($cart['goodsList'] as $goods):?>
                <div class="row no-margin cart-item">
                    <div class="col-xs-12 col-sm-1 no-margin">
                        <a href="<?=$goods['url'];?>" class="thumb-holder">
                            <img class="lazy" alt="" src="<?=$goods['thumb'];?>" />
                        </a>
                    </div>

                    <div class="col-xs-12 col-sm-4 ">
                        <div class="title">
                            <a href="<?=$goods['url'];?>"><?=$goods['goods_name'];?></a>
                        </div>
                        <div class="brand"><?=$goods['brand_name'];?></div>
                    </div>

                    <div class="col-xs-12 col-sm-3 no-margin">
                        <div class="quantity">
                            <div class="le-quantity">
                                <form>
                                    <a class="minus cartchange" type="0" href="#reduce"></a>
                                    <input name="quantity" readonly="readonly" type="text" value="<?=$goods['buy_number'];?>" data-content="<?=$goods['cart_id'];?>" />
                                    <a class="plus cartchange" type="1" href="#add"></a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-2 no-margin">
                        <div class="title">
                            <?= isset($goods['spec']) ? $goods['spec'] : '无规格';?>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-2 no-margin">
                        <div class="price">
                            <?=$goods['format_goods_total'];?>
                        </div>
                        <a class="close-btn" href="javascript:deleteCart(<?=$goods['cart_id'];?>);"></a>
                    </div>


                </div><!-- /.cart-item -->
                <?php endforeach;?>
            </div>
            <!-- ========================================= CONTENT : END ========================================= -->

            <!-- ========================================= SIDEBAR ========================================= -->

            <div class="col-xs-12 col-md-3 no-margin sidebar ">
                <div class="widget cart-summary">
                    <h1 class="border">商品购物车</h1>
                    <div class="body">
                        <ul class="tabled-data no-border inverse-bold">
                            <li>
                                <label>商品总金额</label>
                                <div class="value pull-right"><?=$cart['format_goods_amount'];?></div>
                            </li>
                            <li>
                                <label>配送费</label>
                                <div class="value pull-right"><?=$cart['format_ship_fee'];?></div>
                            </li>
                        </ul>
                        <ul id="total-price" class="tabled-data inverse-bold no-border">
                            <li>
                                <label>订单总金额</label>
                                <div class="value pull-right"><?=$cart['format_order_amount'];?></div>
                            </li>
                        </ul>
                        <div class="buttons-holder">
                            <a class="le-button big" href="http://localhost/~ibrahim/themeforest/HTML/mediacenter/upload/PHP/checkout" >去结算</a>
                            <a class="simple-link block" href="http://localhost/~ibrahim/themeforest/HTML/mediacenter/upload/PHP/home" >继续购买</a>
                        </div>
                    </div>
                </div><!-- /.widget -->

                <div id="cupon-widget" class="widget">
                    <h1 class="border">优惠券</h1>
                    <div class="body">
                        <form>
                            <div class="inline-input">
                                <input data-placeholder="enter coupon code" type="text" />
                                <button class="le-button" type="submit">使用</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.widget -->
            </div><!-- /.sidebar -->

            <?php else: ?>
            <div class="col-xs-12 col-md-12 items-holder no-margin">

                <center><a href="/"><img src="/assets/images/null_cart.jpg" alt=""></a></center>
            </div>
            <?php endif;?>
            <!-- ========================================= SIDEBAR : END ========================================= -->
        </div>
</section>