<?php
/* @var $this yii\web\View */

?>

<div id="top-banner-and-menu">
        <div class="container">

            <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown">
                    <div class="head"><i class="fa fa-list"></i> 全部商品分类</div>
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul class="nav">
                            <!--<li class="dropdown menu-item">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <ul class="dropdown-menu mega-menu">
                                    <li class="yamm-content">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <ul class="list-unstyled">
                                                    <li><a href="index.html">Home</a></li>
                                                    <li><a href="index-2.html">Home Alt</a></li>
                                                    <li><a href="category-grid.html">Category - Grid/List</a></li>
                                                    <li><a href="category-grid-2.html">Category 2 - Grid/List</a></li>
                                                    <li><a href="single-product.html">Single Product</a></li>
                                                    <li><a href="single-product-sidebar.html">Single Product with Sidebar</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="list-unstyled">
                                                    <li><a href="cart.html">Shopping Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="contact.html">Contact Us</a></li>
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-fullwidth.html">Blog Full Width</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="list-unstyled">
                                                    <li><a href="blog-post.html">Blog Post</a></li>
                                                    <li><a href="faq.html">FAQ</a></li>
                                                    <li><a href="terms.html">Terms & Conditions</a></li>
                                                    <li><a href="authentication.html">Login/Register</a></li><li><a href="http://www.moke8.com">More</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </li>--><!-- /.menu-item -->
                            <?php if(is_array($navigation)): foreach ($navigation as $value):?>
                            <li class="dropdown menu-item">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$value['cat_name'];?></a>
                                <ul class="dropdown-menu mega-menu">
                                    <li class="yamm-content">
                                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                                        <div class="row">
                                            <div class="col-xs-12 col-lg-4">
                                                <ul>
                                                    <?php if(is_array($value['son'])): foreach (array_slice($value['son'],0,ceil(count($value['son'])/2)) as $val): ?>
                                                    <li><a href="<?=$val['url'];?>"><?=$val['cat_name'];?></a></li>
                                    <?php endforeach;endif;?>
                                                </ul>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <ul>
                                                    <?php if(is_array($value['son'])): foreach (array_slice($value['son'],ceil(count($value['son'])/2)) as $val): ?>
                                                        <li><a href="#"><?=$val['cat_name'];?></a></li>
                                                    <?php endforeach;endif;?>
                                                </ul>
                                            </div>

                                            <div class="dropdown-banner-holder">
                                                <a href="#"><img alt="" src="assets/images/banners/banner-side.png" /></a>
                                            </div>
                                        </div>
                                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                                    </li>
                                </ul>
                            </li><!-- /.menu-item -->
                            <?php endforeach;endif;?>
                        </ul><!-- /.nav -->
                    </nav><!-- /.megamenu-horizontal -->
                </div><!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->		</div><!-- /.sidemenu-holder -->

            <div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        <?php if(is_array($slider)): foreach ($slider as $value): ?>
                        <a href="<?=$value['jump_url'];?>" >
                        <div class="item" style="background-image: url(<?=$value['img_path'];?>);">
                            <div class="container-fluid">
                                <div class="caption vertical-center text-left">






                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.item -->
                        </a>
                        <?php endforeach;endif;?>

                    </div><!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->
            </div><!-- /.homebanner-holder -->

        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->

    <!-- ========================================= HOME BANNERS ========================================= -->
    <section id="banner-holder" class="wow fadeInUp">
        <div class="container">
            <div class="col-xs-12 col-lg-6 no-margin banner">
                <a href="category-grid-2.html">
                    <div class="banner-text theblue">
                        <h1>New Life</h1>
                        <span class="tagline">Introducing New Category</span>
                    </div>
                    <img class="banner-image" alt="" src="assets/images/blank.gif" data-echo="assets/images/banners/banner-narrow-01.jpg" />
                </a>
            </div>
            <div class="col-xs-12 col-lg-6 no-margin text-right banner">
                <a href="category-grid-2.html">
                    <div class="banner-text right">
                        <h1>Time &amp; Style</h1>
                        <span class="tagline">Checkout new arrivals</span>
                    </div>
                    <img class="banner-image" alt="" src="assets/images/blank.gif" data-echo="assets/images/banners/banner-narrow-02.jpg" />
                </a>
            </div>
        </div><!-- /.container -->
    </section><!-- /#banner-holder -->
    <!-- ========================================= HOME BANNERS : END ========================================= -->
    <div id="products-tab" class="wow fadeInUp">
        <div class="container">
            <div class="tab-holder">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" >
                    <li class="active"><a href="#featured" data-toggle="tab">精品推荐</a></li>
                    <li><a href="#new-arrivals" data-toggle="tab">新品推荐</a></li>
                    <li><a href="#top-sales" data-toggle="tab">最佳热销</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="featured">
                        <div class="product-grid-holder">
                            <?php if(is_array($bestGoods)): foreach ($bestGoods as $goods):?>
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
                                            <a href="<?=$goods['url'];?>" class="le-button">加入购物车</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">加入收藏</a>
<!--                                            <a class="btn-add-to-compare" href="#">compare</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;endif; ?>
                        </div>
                        <div class="loadmore-holder text-center">
                            <a class="btn-loadmore" href="javascript:void(0);" datatype="is_best" page="1">
                                <i class="fa fa-plus"></i>
                                加载更多</a>
                        </div>

                    </div>
                    <div class="tab-pane" id="new-arrivals">
                        <div class="product-grid-holder">
                            <?php if(is_array($newGoods)): foreach ($newGoods as $goods):?>
                            <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                <div class="product-item">
                                    <?php if($goods['is_best']):?>
                                        <div class="ribbon green"><span>best</span></div>
                                    <?php endif;?>
                                    <?php if($goods['is_hot']):?>
                                        <div class="ribbon red"><span>hot</span></div>
                                    <?php endif;?>


                                    <div class="image">
                                        <img alt="" src="assets/images/blank.gif" data-echo="<?=$goods['thumb'];?>" />
                                    </div>
                                    <div class="body">
                                        <div class="label-discount clear"></div>
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
                                            <a href="<?=$goods['url'];?>" class="le-button">加入购物车</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">加入收藏</a>
<!--                                            <a class="btn-add-to-compare" href="#">compare</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;endif; ?>

                        </div>
                        <div class="loadmore-holder text-center">
                            <a class="btn-loadmore" href="javascript:void(0);" datatype="is_new" page="1">
                                <i class="fa fa-plus"></i>
                                加载更多</a>
                        </div>

                    </div>

                    <div class="tab-pane" id="top-sales">
                        <div class="product-grid-holder">

                            <?php if(is_array($hotGoods)): foreach ($hotGoods as $goods):?>
                                <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                    <div class="product-item">
                                        <?php if($goods['is_best']):?>
                                            <div class="ribbon green"><span>best</span></div>
                                        <?php endif;?>
                                        <?php if($goods['is_new']):?>
                                            <div class="ribbon blue"><span>new</span></div>
                                        <?php endif;?>

                                        <div class="image">
                                            <img alt="" src="assets/images/blank.gif" data-echo="<?=$goods['thumb'];?>" />
                                        </div>
                                        <div class="body">
                                            <div class="label-discount clear"></div>
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
                                                <a href="<?=$goods['url'];?>" class="le-button">加入购物车</a>
                                            </div>
                                            <div class="wish-compare">
                                                <a class="btn-add-to-wishlist" href="#">加入收藏</a>
                                                <!--                                            <a class="btn-add-to-compare" href="#">compare</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;endif; ?>


                        </div>
                        <div class="loadmore-holder text-center">
                            <a class="btn-loadmore" href="javascript:void(0);" datatype="is_hot" page="1">
                                <i class="fa fa-plus"></i>
                                加载更多</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================================= BEST SELLERS ========================================= -->
    <section id="bestsellers" class="color-bg wow fadeInUp">
        <div class="container">
            <h1 class="section-title">促销商品</h1>

            <div class="product-grid-holder medium">
                <div class="col-xs-12 col-md-7 no-margin">

                    <div class="row no-margin">
                        <?php if(is_array($promotes)): foreach (array_slice($promotes,0,3) as $goods):?>
                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                            <div class="product-item">
                                <div class="image">
                                    <img alt="" src="assets/images/blank.gif" data-echo="<?=$goods['prothumb'];?>" />
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="title">
                                        <a href="<?=$goods['url'];?>"><?=$goods['goods_name'];?></a>
                                    </div>
                                    <div class="brand"><?=$goods['brand_name'];?></div>
                                </div>
                                <div class="prices">

                                    <div class="price-current text-right"><?=$goods['shop_price'];?></div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="single-product.html" class="le-button">Add to cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="<?=$goods['url'];?>">加入购物车</a>
<!--                                        <a class="btn-add-to-compare" href="#">Compare</a>-->
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.product-item-holder -->
                    <?php endforeach;endif;?>
                    </div><!-- /.row -->

                    <div class="row no-margin">
                        <?php if(is_array(array_slice($promotes,3,3))): foreach (array_slice($promotes,3,3) as $goods):?>
                            <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                                <div class="product-item">
                                    <div class="image">
                                        <img alt="" src="assets/images/blank.gif" data-echo="<?=$goods['prothumb'];?>" />
                                    </div>
                                    <div class="body">
                                        <div class="label-discount clear"></div>
                                        <div class="title">
                                            <a href="<?=$goods['url'];?>"><?=$goods['goods_name'];?></a>
                                        </div>
                                        <div class="brand"><?=$goods['brand_name'];?></div>
                                    </div>
                                    <div class="prices">

                                        <div class="price-current text-right"><?=$goods['shop_price'];?></div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="<?=$goods['url'];?>" class="le-button">加入购物车</a>
                                        </div>
                                        <div class="wish-compare">
                                            <a class="btn-add-to-wishlist" href="#">加入收藏</a>
<!--                                            <a class="btn-add-to-compare" href="#">Compare</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.product-item-holder -->
                        <?php endforeach;endif;?>

                    </div><!-- /.row -->
                </div><!-- /.col -->
                <div class="col-xs-12 col-md-5 no-margin">
                    <div class="product-item-holder size-big single-product-gallery small-gallery">

                        <div id="best-seller-single-product-slider" class="single-product-slider owl-carousel">
                            <?php if($mainPromote['galleries']):foreach ($mainPromote['galleries'] as $key=>$gallery): ?>
                            <div class="single-product-gallery-item" id="slide<?=$key;?>">
                                <a data-rel="prettyphoto" href="<?=$gallery['url'];?>">
                                    <img alt="" src="assets/images/blank.gif" data-echo="<?=$gallery['middle'];?>" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->
                            <?php endforeach;endif;?>
                        </div><!-- /.single-product-slider -->

                        <div class="gallery-thumbs clearfix">
                            <ul>
                                <?php if($mainPromote['galleries']):foreach ($mainPromote['galleries'] as $key=>$gallery): ?>
                                <li><a class="horizontal-thumb <?php if($key==0):?>active<?php endif;?>" data-target="#best-seller-single-product-slider" data-slide="<?=$key;?>" href="#slide<?=$key;?>"><img alt="" src="assets/images/blank.gif" data-echo="<?=$gallery['mini'];?>" /></a></li>
                                <?php endforeach;endif;?>
                            </ul>
                        </div><!-- /.gallery-thumbs -->

                        <div class="body">
                            <div class="label-discount clear"></div>
                            <div class="title">
                                <a href="single-product.html"><?=$mainPromote['goods_name'];?></a>
                            </div>
                            <div class="brand"><?=$mainPromote['brand_name'];?></div>
                        </div>
                        <div class="prices text-right">
                            <div class="price-current inline"><?=$mainPromote['shop_price'];?></div>
                            <a href="cart.html" class="le-button big inline">加入购物车</a>
                        </div>
                    </div><!-- /.product-item-holder -->
                </div><!-- /.col -->

            </div><!-- /.product-grid-holder -->
        </div><!-- /.container -->
    </section><!-- /#bestsellers -->
    <!-- ========================================= BEST SELLERS : END ========================================= -->
    <!-- ========================================= RECENTLY VIEWED ========================================= -->
    <section id="recently-reviewd" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder hover">

                <div class="title-nav">
                    <h2 class="h1">最近浏览</h2>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->

                <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
                    <?php if(is_array($historyList)): foreach ($historyList as $goods):?>
                        <div class="no-margin carousel-item product-item-holder size-small hover">
                            <div class="product-item">
                                <?php if($goods['is_hot']):?>
                                    <div class="ribbon red"><span>hot</span></div>
                                <?php endif;?>
                                <?php if($goods['is_new']):?>
                                    <div class="ribbon blue"><span>new</span></div>
                                <?php endif;?>
                                <?php if($goods['is_best']):?>
                                    <div class="ribbon green"><span>best</span></div>
                                <?php endif;?>
                                <div class="image">
                                    <img alt="" src="assets/images/blank.gif" data-echo="<?=$goods['prothumb'];?>" />
                                </div>
                                <div class="body">
                                    <div class="title">
                                        <a href="<?=$goods['url'];?>"><?=$goods['goods_name'];?></a>
                                    </div>
                                    <div class="brand"><?=$goods['brand_name'];?></div>
                                </div>
                                <div class="prices">
                                    <div class="price-current text-right"><?=$goods['shop_price'];?></div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="<?=$goods['url'];?>" class="le-button">Add to Cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
                                        <a class="btn-add-to-compare" href="#">Compare</a>
                                    </div>
                                </div>
                            </div><!-- /.product-item -->
                        </div><!-- /.product-item-holder -->
                    <?php endforeach;endif;?>

                </div><!-- /#recently-carousel -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#recently-reviewd -->
    <!-- ========================================= RECENTLY VIEWED : END ========================================= -->
    <!-- ========================================= TOP BRANDS ========================================= -->
    <section id="top-brands" class="wow fadeInUp">
        <div class="container">
            <div class="carousel-holder" >

                <div class="title-nav">
                    <h1>热门品牌</h1>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->

                <div id="owl-brands" class="owl-carousel brands-carousel">

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-01.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-02.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-03.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-04.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-01.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-02.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-03.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                    <div class="carousel-item">
                        <a href="#">
                            <img alt="" src="assets/images/brands/brand-04.jpg" />
                        </a>
                    </div><!-- /.carousel-item -->

                </div><!-- /.brands-caresoul -->

            </div><!-- /.carousel-holder -->
        </div><!-- /.container -->
    </section><!-- /#top-brands -->
    <!-- ========================================= TOP BRANDS : END ========================================= -->
