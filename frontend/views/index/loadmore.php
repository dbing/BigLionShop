<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/10/9
 * @Time:   10:19
 */
?>

<?php if(is_array($goodsList)): foreach ($goodsList as $goods):?>
    <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
        <div class="product-item">
            <?php if($goods['is_new']):?>
                <div class="ribbon blue"><span>new</span></div>
            <?php endif;?>
            <?php if($goods['is_hot']):?>
                <div class="ribbon red"><span>hot</span></div>
            <?php endif;?>

            <div class="image">
                <img alt="" src="assets/images/blank.gif" data-echo="<?=$goods['thumb'];?>" />
            </div>
            <div class="body">
                <div class="label-discount green"><?=$goods['discount'];?> sale</div>
                <div class="title">
                    <a href="<?=$goods['url'];?>"><?=$goods['goods_name'];?></a>
                </div>
                <div class="brand"><?=$goods['brand_name'];?></div>
            </div>
            <div class="prices">
                <div class="price-prev"><?=$goods['market_price'];?></div>
                <div class="price-current pull-right"><?=$goods['shop_price'];?></div>
            </div>

            <div class="hover-area">
                <div class="add-cart-button">
                    <a href="single-product.html" class="le-button">add to cart</a>
                </div>
                <div class="wish-compare">
                    <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                    <a class="btn-add-to-compare" href="#">compare</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;endif; ?>
