<?php
/* @var $this yii\web\View */
?>
<section id="category-grid">
        <div class="container">

            <!-- ========================================= SIDEBAR ========================================= -->
            <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">

                <!-- ========================================= PRODUCT FILTER ========================================= -->
                <div class="widget">
                    <h1>商品筛选</h1>
                    <div class="body bordered">

                        <div class="category-filter">
                            <h2>Brands</h2>
                            <hr>
                            <ul>
                                <li><input checked="checked" class="le-checkbox" type="checkbox"  /> <label>Samsung</label> <span class="pull-right">(2)</span></li>
                                <li><input  class="le-checkbox" type="checkbox" /> <label>Dell</label> <span class="pull-right">(8)</span></li>
                                <li><input  class="le-checkbox" type="checkbox" /> <label>Toshiba</label> <span class="pull-right">(1)</span></li>
                                <li><input  class="le-checkbox" type="checkbox" /> <label>Apple</label> <span class="pull-right">(5)</span></li>
                            </ul>
                        </div><!-- /.category-filter -->

                        <div class="price-filter">
                            <h2>价格</h2>
                            <hr>
                            <div class="price-range-holder">

                                <input type="text" class="price-slider" value="" >

                                <span class="min-max">
                    Price: $89 - $2899
                </span>
                                <span class="filter-button">
                    <a href="#">Filter</a>
                </span>
                            </div>
                        </div><!-- /.price-filter -->

                    </div><!-- /.body -->
                </div><!-- /.widget -->
                <!-- ========================================= PRODUCT FILTER : END ========================================= -->
                <!-- ========================================= CATEGORY TREE ========================================= -->
                <div class="widget accordion-widget category-accordions">
                    <h1 class="border">全部分类</h1>
                    <div class="accordion">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" href="#collapseOne">
                                    laptops &amp; computers
                                </a>
                            </div>
                            <div id="collapseOne" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    <ul>
                                        <li>
                                            <div class="accordion-heading">
                                                <a href="#collapseSub1" data-toggle="collapse">laptop</a>
                                            </div>
                                            <div id="collapseSub1" class="accordion-body collapse in">
                                                <ul>
                                                    <li><a href="#">Two Level Accordion</a></li>
                                                </ul>
                                            </div><!-- /.accordion-body -->
                                        </li>
                                        <li>
                                            <div class="accordion-heading">
                                                <a href="#collapseSub2" data-toggle="collapse">tablet</a>
                                            </div>
                                            <div id="collapseSub2" class="accordion-body collapse in">
                                                <ul>
                                                    <li>
                                                        <div class="accordion-heading">
                                                            <a href="#collapseSub3" data-toggle="collapse">Three Level Accordion</a>
                                                        </div>
                                                        <div id="collapseSub3" class="accordion-body collapse in">
                                                            <ul>
                                                                <li><a href="#">PDA</a></li>
                                                                <li><a href="#">notebook</a></li>
                                                                <li><a href="#">mini notebook</a></li>
                                                            </ul>
                                                        </div><!-- /.accordion-body -->
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a href="#">PDA</a></li>
                                        <li><a href="#">notebook</a></li>
                                        <li><a href="#">mini notebook</a></li>
                                    </ul>
                                </div><!-- /.accordion-inner -->
                            </div>
                        </div><!-- /.accordion-group -->

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapseTwo">
                                    desktop PC
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul>
                                        <li><a href="#">gaming</a></li>
                                        <li><a href="#">office</a></li>
                                        <li><a href="#">kids</a></li>
                                        <li><a href="#">for women</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.accordion-group -->


                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapse3">
                                    laptops
                                </a>
                            </div>
                            <div id="collapse3" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul>
                                        <li><a href="#">light weight</a></li>
                                        <li><a href="#">wide monitor</a></li>
                                        <li><a href="#">ultra laptop</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.accordion-group -->


                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse"  href="#collapse4">
                                    notebooks
                                </a>
                            </div>
                            <div id="collapse4" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul>
                                        <li><a href="#">light weight</a></li>
                                        <li><a href="#">wide monitor</a></li>
                                        <li><a href="#">ultra laptop</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.accordion-group -->

                    </div><!-- /.accordion -->
                </div><!-- /.category-accordions -->
                <!-- ========================================= CATEGORY TREE : END ========================================= -->
                <!-- ========================================= LINKS ========================================= -->
                <div class="widget">
                    <h1 class="border">导航连接</h1>
                    <div class="body">
                        <ul class="le-links">
                            <li><a href="#">递送方式</a></li>
                            <li><a href="#">安全支付</a></li>
                            <li><a href="#">我们的店铺</a></li>
                            <li><a href="#">联系我们</a></li>
                        </ul><!-- /.le-links -->
                    </div><!-- /.body -->
                </div><!-- /.widget -->
                <!-- ========================================= LINKS : END ========================================= -->
                <div class="widget">
                    <div class="simple-banner">
                        <a href="#"><img alt="" class="img-responsive" src="assets/images/blank.gif" data-echo="assets/images/banners/banner-simple.jpg" /></a>
                    </div>
                </div>
                <!-- ========================================= FEATURED PRODUCTS ========================================= -->
                <div class="widget">
                    <h1 class="border">精品推荐</h1>
                    <ul class="product-list">

                        <li class="sidebar-product-list-item">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 no-margin">
                                    <a href="#" class="thumb-holder">
                                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-small-01.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-8 col-sm-8 no-margin">
                                    <a href="#">Netbook Acer </a>
                                    <div class="price">
                                        <div class="price-prev">$2000</div>
                                        <div class="price-current">$1873</div>
                                    </div>
                                </div>
                            </div>
                        </li><!-- /.sidebar-product-list-item -->

                        <li class="sidebar-product-list-item">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 no-margin">
                                    <a href="#" class="thumb-holder">
                                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-small-02.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-8 col-sm-8 no-margin">
                                    <a href="#">PowerShot Elph 115 16MP Digital Camera</a>
                                    <div class="price">
                                        <div class="price-prev">$2000</div>
                                        <div class="price-current">$1873</div>
                                    </div>
                                </div>
                            </div>
                        </li><!-- /.sidebar-product-list-item -->

                        <li class="sidebar-product-list-item">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 no-margin">
                                    <a href="#" class="thumb-holder">
                                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-small-03.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-8 col-sm-8 no-margin">
                                    <a href="#">PowerShot Elph 115 16MP Digital Camera</a>
                                    <div class="price">
                                        <div class="price-prev">$2000</div>
                                        <div class="price-current">$1873</div>
                                    </div>
                                </div>
                            </div>
                        </li><!-- /.sidebar-product-list-item -->

                        <li class="sidebar-product-list-item">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 no-margin">
                                    <a href="#" class="thumb-holder">
                                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-small-01.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-8 col-sm-8 no-margin">
                                    <a href="#">Netbook Acer </a>
                                    <div class="price">
                                        <div class="price-prev">$2000</div>
                                        <div class="price-current">$1873</div>
                                    </div>
                                </div>
                            </div>
                        </li><!-- /.sidebar-product-list-item -->

                        <li class="sidebar-product-list-item">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 no-margin">
                                    <a href="#" class="thumb-holder">
                                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-small-02.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-8 col-sm-8 no-margin">
                                    <a href="#">PowerShot Elph 115 16MP Digital Camera</a>
                                    <div class="price">
                                        <div class="price-prev">$2000</div>
                                        <div class="price-current">$1873</div>
                                    </div>
                                </div>
                            </div>
                        </li><!-- /.sidebar-product-list-item -->

                    </ul><!-- /.product-list -->
                </div><!-- /.widget -->
                <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
            </div>
            <!-- ========================================= SIDEBAR : END ========================================= -->

            <!-- ========================================= CONTENT ========================================= -->

            <div class="col-xs-12 col-sm-9 no-margin wide sidebar">

                <div id="grid-page-banner">
                    <a href="#">
                        <img src="assets/images/banners/banner-gamer.jpg" alt="" />
                    </a>
                </div>

                <section id="gaming">
                    <div class="grid-list-products">
                        <h2 class="section-title">Gaming</h2>

                        <div class="control-bar">
                            <div id="popularity-sort" class="le-select" >
                                <select data-placeholder="sort by popularity">
                                    <option value="1">1-100 players</option>
                                    <option value="2">101-200 players</option>
                                    <option value="3">200+ players</option>
                                </select>
                            </div>

                            <div id="item-count" class="le-select">
                                <select>
                                    <option value="1">24 per page</option>
                                    <option value="2">48 per page</option>
                                    <option value="3">32 per page</option>
                                </select>
                            </div>

                            <div class="grid-list-buttons">
                                <ul>
                                    <li class="grid-list-button-item active"><a data-toggle="tab" href="#grid-view"><i class="fa fa-th-large"></i> Grid</a></li>
                                    <li class="grid-list-button-item "><a data-toggle="tab" href="#list-view"><i class="fa fa-th-list"></i> List</a></li>
                                </ul>
                            </div>
                        </div><!-- /.control-bar -->

                        <div class="tab-content">
                            <div id="grid-view" class="products-grid fade tab-pane in active">

                                <div class="product-grid-holder">
                                    <div class="row no-margin">

                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="ribbon red"><span>sale</span></div>
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-01.jpg" />
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount green">-50% sale</div>
                                                    <div class="title">
                                                        <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                                    </div>
                                                    <div class="brand">sony</div>
                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="price-current pull-right">$1199.00</div>
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
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->

                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="ribbon blue"><span>new!</span></div>
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-02.jpg" />
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount clear"></div>
                                                    <div class="title">
                                                        <a href="single-product.html">White lumia 9001</a>
                                                    </div>
                                                    <div class="brand">nokia</div>
                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="price-current pull-right">$1199.00</div>
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
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->

                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-03.jpg" />
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount clear"></div>
                                                    <div class="title">
                                                        <a href="single-product.html">POV Action Cam</a>
                                                    </div>
                                                    <div class="brand">sony</div>
                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="price-current pull-right">$1199.00</div>
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
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->

                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="ribbon red"><span>sale</span></div>
                                                <div class="ribbon green"><span>bestseller</span></div>
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-04.jpg" />
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount clear"></div>
                                                    <div class="title">
                                                        <a href="single-product.html">Netbook Acer TravelMate B113-E-10072</a>
                                                    </div>
                                                    <div class="brand">acer</div>
                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="price-current pull-right">$1199.00</div>
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
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->

                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="ribbon red"><span>sale</span></div>
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-01.jpg" />
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount green">-50% sale</div>
                                                    <div class="title">
                                                        <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                                    </div>
                                                    <div class="brand">sony</div>
                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="price-current pull-right">$1199.00</div>
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
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->

                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="ribbon blue"><span>new!</span></div>
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-02.jpg" />
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount clear"></div>
                                                    <div class="title">
                                                        <a href="single-product.html">White lumia 9001</a>
                                                    </div>
                                                    <div class="brand">nokia</div>
                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="price-current pull-right">$1199.00</div>
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
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->

                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-03.jpg" />
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount clear"></div>
                                                    <div class="title">
                                                        <a href="single-product.html">POV Action Cam</a>
                                                    </div>
                                                    <div class="brand">sony</div>
                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="price-current pull-right">$1199.00</div>
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
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->

                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="ribbon red"><span>sale</span></div>
                                                <div class="ribbon green"><span>bestseller</span></div>
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-04.jpg" />
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount clear"></div>
                                                    <div class="title">
                                                        <a href="single-product.html">Netbook Acer TravelMate B113-E-10072</a>
                                                    </div>
                                                    <div class="brand">acer</div>
                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="price-current pull-right">$1199.00</div>
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
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->

                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-03.jpg" />
                                                </div>
                                                <div class="body">
                                                    <div class="label-discount clear"></div>
                                                    <div class="title">
                                                        <a href="single-product.html">POV Action Cam</a>
                                                    </div>
                                                    <div class="brand">sony</div>
                                                </div>
                                                <div class="prices">
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="price-current pull-right">$1199.00</div>
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
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->

                                    </div><!-- /.row -->
                                </div><!-- /.product-grid-holder -->

                                <div class="pagination-holder">
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-6 text-left">
                                            <ul class="pagination ">
                                                <li class="current"><a  href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">next</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-xs-12 col-sm-6">
                                            <div class="result-counter">
                                                Showing <span>1-9</span> of <span>11</span> results
                                            </div>
                                        </div>

                                    </div><!-- /.row -->
                                </div><!-- /.pagination-holder -->
                            </div><!-- /.products-grid #grid-view -->

                            <div id="list-view" class="products-grid fade tab-pane ">
                                <div class="products-list">

                                    <div class="product-item product-item-holder">
                                        <div class="ribbon red"><span>sale</span></div>
                                        <div class="ribbon blue"><span>new!</span></div>
                                        <div class="row">
                                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-01.jpg" />
                                                </div>
                                            </div><!-- /.image-holder -->
                                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                                <div class="body">
                                                    <div class="label-discount green">-50% sale</div>
                                                    <div class="title">
                                                        <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                                    </div>
                                                    <div class="brand">sony</div>
                                                    <div class="excerpt">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis euismod erat sit amet porta. Etiam venenatis ac diam ac tristique. Morbi accumsan consectetur odio ut tincidunt.</p>
                                                    </div>
                                                    <div class="addto-compare">
                                                        <a class="btn-add-to-compare" href="#">add to compare list</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.body-holder -->
                                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                                <div class="right-clmn">
                                                    <div class="price-current">$1199.00</div>
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="availability"><label>availability:</label><span class="available">  in stock</span></div>
                                                    <a class="le-button" href="#">add to cart</a>
                                                    <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                                </div>
                                            </div><!-- /.price-area -->
                                        </div><!-- /.row -->
                                    </div><!-- /.product-item -->


                                    <div class="product-item product-item-holder">
                                        <div class="ribbon green"><span>bestseller</span></div>
                                        <div class="row">
                                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-02.jpg" />
                                                </div>
                                            </div><!-- /.image-holder -->
                                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                                <div class="body">
                                                    <div class="label-discount clear"></div>
                                                    <div class="title">
                                                        <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                                    </div>
                                                    <div class="brand">sony</div>
                                                    <div class="excerpt">
                                                        <div class="star-holder">
                                                            <div class="star" data-score="4"></div>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis euismod erat sit amet porta. Etiam venenatis ac diam ac tristique. Morbi accumsan consectetur odio ut tincidunt.</p>
                                                    </div>
                                                    <div class="addto-compare">
                                                        <a class="btn-add-to-compare" href="#">add to compare list</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.body-holder -->
                                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                                <div class="right-clmn">
                                                    <div class="price-current">$1199.00</div>
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="availability"><label>availability:</label><span class="not-available">out of stock</span></div>
                                                    <a class="le-button disabled" href="#">add to cart</a>
                                                    <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                                </div>
                                            </div><!-- /.price-area -->
                                        </div><!-- /.row -->
                                    </div><!-- /.product-item -->


                                    <div class="product-item product-item-holder">
                                        <div class="ribbon red"><span>sell</span></div>
                                        <div class="row">
                                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-03.jpg" />
                                                </div>
                                            </div><!-- /.image-holder -->
                                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                                <div class="body">
                                                    <div class="label-discount clear"></div>
                                                    <div class="title">
                                                        <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                                    </div>
                                                    <div class="brand">sony</div>
                                                    <div class="excerpt">
                                                        <div class="star-holder">
                                                            <div class="star" data-score="2"></div>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis euismod erat sit amet porta. Etiam venenatis ac diam ac tristique. Morbi accumsan consectetur odio ut tincidunt. </p>
                                                    </div>
                                                    <div class="addto-compare">
                                                        <a class="btn-add-to-compare" href="#">add to compare list</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.body-holder -->
                                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                                <div class="right-clmn">
                                                    <div class="price-current">$1199.00</div>
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="availability"><label>availability:</label><span class="available">in stock</span></div>
                                                    <a class="le-button" href="#">add to cart</a>
                                                    <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                                </div>
                                            </div><!-- /.price-area -->
                                        </div><!-- /.row -->
                                    </div><!-- /.product-item -->

                                    <div class="product-item product-item-holder">
                                        <div class="row">
                                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-04.jpg" />
                                                </div>
                                            </div><!-- /.image-holder -->
                                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                                <div class="body">
                                                    <div class="label-discount green">-50% sale</div>
                                                    <div class="title">
                                                        <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                                    </div>
                                                    <div class="brand">sony</div>
                                                    <div class="excerpt">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis euismod erat sit amet porta. Etiam venenatis ac diam ac tristique. Morbi accumsan consectetur odio ut tincidunt. </p>
                                                    </div>
                                                    <div class="addto-compare">
                                                        <a class="btn-add-to-compare" href="#">add to compare list</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.body-holder -->
                                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                                <div class="right-clmn">
                                                    <div class="price-current">$1199.00</div>
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="availability"><label>availability:</label><span class="available">  in stock</span></div>
                                                    <a class="le-button" href="#">add to cart</a>
                                                    <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                                </div>
                                            </div><!-- /.price-area -->
                                        </div><!-- /.row -->
                                    </div><!-- /.product-item -->

                                    <div class="product-item product-item-holder">
                                        <div class="ribbon green"><span>bestseller</span></div>
                                        <div class="row">
                                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                                <div class="image">
                                                    <img alt="" src="assets/images/blank.gif" data-echo="assets/images/products/product-05.jpg" />
                                                </div>
                                            </div><!-- /.image-holder -->
                                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                                <div class="body">
                                                    <div class="label-discount clear"></div>
                                                    <div class="title">
                                                        <a href="single-product.html">VAIO Fit Laptop - Windows 8 SVF14322CXW</a>
                                                    </div>
                                                    <div class="brand">sony</div>
                                                    <div class="excerpt">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis euismod erat sit amet porta. Etiam venenatis ac diam ac tristique. Morbi accumsan consectetur odio ut tincidunt.</p>
                                                    </div>
                                                    <div class="addto-compare">
                                                        <a class="btn-add-to-compare" href="#">add to compare list</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.body-holder -->
                                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                                <div class="right-clmn">
                                                    <div class="price-current">$1199.00</div>
                                                    <div class="price-prev">$1399.00</div>
                                                    <div class="availability"><label>availability:</label><span class="available">  in stock</span></div>
                                                    <a class="le-button" href="#">add to cart</a>
                                                    <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                                </div>
                                            </div><!-- /.price-area -->
                                        </div><!-- /.row -->
                                    </div><!-- /.product-item -->

                                </div><!-- /.products-list -->

                                <div class="pagination-holder">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 text-left">
                                            <ul class="pagination">
                                                <li class="current"><a  href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">next</a></li>
                                            </ul><!-- /.pagination -->
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="result-counter">
                                                Showing <span>1-9</span> of <span>11</span> results
                                            </div><!-- /.result-counter -->
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.pagination-holder -->

                            </div><!-- /.products-grid #list-view -->

                        </div><!-- /.tab-content -->
                    </div><!-- /.grid-list-products -->

                </section><!-- /#gaming -->
            </div><!-- /.col -->
            <!-- ========================================= CONTENT : END ========================================= -->
        </div><!-- /.container -->
    </section><!-- /#category-grid -->