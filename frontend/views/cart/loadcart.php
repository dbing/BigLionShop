<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/10/20
 * @Time:   15:52
 */

?>

    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <div class="basket-item-count">
            <span class="count"><?=count($cart['goodsList'])?></span>
            <img src="/assets/images/icon-cart.png" alt="" />
        </div>

        <div class="total-price-basket">
            <span class="lbl">your cart:</span>
            <span class="total-price">
                        <span class="sign"></span><span class="value"><?=$cart['format_goods_amount'];?></span>
                    </span>
        </div>
    </a>

    <ul class="dropdown-menu">
        <?php if(is_array($cart['goodsList']) && !empty($cart['goodsList'])): foreach ($cart['goodsList'] as $goods):?>
        <li>
            <div class="basket-item">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 no-margin text-center">
                        <div class="thumb">
                            <img alt="" src="<?=$goods['thumb'];?>" />
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 no-margin">
                        <div class="title"><?= mb_substr($goods['goods_name'],0,25).'...';?></div>
                        <div class="price"><?=$goods['format_goods_price'];?></div>
                    </div>
                </div>
                <a class="close-btn" href="#"></a>
            </div>
        </li>
        <?php endforeach;endif;?>
        <li class="checkout">
            <div class="basket-item">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <a href="<?= \yii\helpers\Url::to(['cart/index']);?>" class="le-button inverse">View cart</a>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <a href="<?= \yii\helpers\Url::to(['order/checkout']);?>" class="le-button">Checkout</a>
                    </div>
                </div>
            </div>
        </li>

    </ul>
