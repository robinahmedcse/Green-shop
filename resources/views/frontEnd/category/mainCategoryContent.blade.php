@extends('frontEnd.master')


@section('mainContent')


<?php 
// echo '<pre>';
//       print_r($published_main_category_product);
//        exit();
?>

<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">
    <!-- Start Search Popap -->
    <div class="search__area">
        <div class="container" >
            <div class="row" >
                <div class="col-md-12" >
                    <div class="search__inner">
                        <form action="#" method="get">
                            <input placeholder="Search here... " type="text">
                            <button type="submit"></button>
                        </form>
                        <div class="search__close__btn">
                            <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Search Popap -->
    <!-- Start Cart Panel -->
    <div class="shopping__cart">
        <div class="shopping__cart__inner">
            <div class="offsetmenu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <div class="shp__cart__wrap">
                <div class="shp__single__product">
                    <div class="shp__pro__thumb">
                        <a href="#">
                            <img src="{{asset('public/frontEnd/')}}/images/product-2/sm-smg/1.jpg" alt="product images">
                        </a>
                    </div>
                    <div class="shp__pro__details">
                        <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                        <span class="quantity">QTY: 1</span>
                        <span class="shp__price">$105.00</span>
                    </div>
                    <div class="remove__btn">
                        <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
                <div class="shp__single__product">
                    <div class="shp__pro__thumb">
                        <a href="#">
                            <img src="{{asset('public/frontEnd/')}}/images/product-2/sm-smg/2.jpg" alt="product images">
                        </a>
                    </div>
                    <div class="shp__pro__details">
                        <h2><a href="product-details.html">Brone Candle</a></h2>
                        <span class="quantity">QTY: 1</span>
                        <span class="shp__price">$25.00</span>
                    </div>
                    <div class="remove__btn">
                        <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
            </div>
            <ul class="shoping__total">
                <li class="subtotal">Subtotal:</li>
                <li class="total__price">$130.00</li>
            </ul>
            <ul class="shopping__btn">
                <li><a href="cart.html">View Cart</a></li>
                <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
            </ul>
        </div>
    </div>
    <!-- End Cart Panel -->
</div>
<!-- End Offset Wrapper -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{asset('public/frontEnd/')}}/images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Products</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->





<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                <div class="htc__product__rightidebar">
                    <div class="htc__grid__top">
                        <div class="htc__select__option">
                            <select class="ht__select">
                                <option>Default softing</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by newness</option>
                            </select>
                            <select class="ht__select">
                                <option>Show by</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by newness</option>
                            </select>
                        </div>
                        <div class="ht__pro__qun">
                            <span>Showing 1-12 of 1033 products</span>
                        </div>
                        <!-- Start List And Grid View -->
                        <ul class="view__mode" role="tablist">
                            <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                            <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                    
                    
                    
                    <!-- Start Product View -->
                    <div class="row">
                        <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                <!-- Start Single Product -->
                                   @foreach($published_main_category_product as $product)
                                   
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="category">
                                                                                <?php
  $x=$product->product_name;
 $xc=strtolower($x);
  //echo $xc;
  
  $xx=preg_replace('/\s+/', '-',  $xc);
  //echo   $xx;
 // exit();
?>
                                        <div class="ht__cat__thumb">
                                            <a href="{{URL::to($xx.'/product-details/'.$product->product_id)}}" target="_blank">
                                                <img src="../../{{$product->image_url}}" alt="product images">
                                            </a>
                                        </div>
                                        <div class="fr__hover__info">
                                            <ul class="product__action">
                                              <!--   <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li> -->

                                                 <li><a href="{{URL::to('/add/to/cart/'.$product->product_id)}}"><i class="icon-handbag icons"></i></a></li>

                                               
                                            </ul>
                                        </div>
                                        <div class="fr__product__inner">
                                            <h4><a href="{{URL::to($xx.'/product-details/'.$product->product_id)}}" target="_blank">{{$product->product_name}}</a></h4>
                                            <ul class="fr__pro__prize">
                                                <li class="old__prize">{{$product->product_price}} BDT</li>
<!--                                                <li>$25.9</li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                <!-- End Single Product -->
                                <!-- Start Single Product -->
                             
                             
                                <!-- End Single Product -->
                            </div>
                            <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                <div class="col-xs-12">
                                    <div class="ht__list__wrap">
                                       
                                         @foreach($published_main_category_product as $product)
                                        <!-- Start List Product -->
                                        <div class="ht__list__product">
                                            <div class="ht__list__thumb">
                                                <a href="product-details.html"><img src="../../{{$product->image_url}}" alt="product images"></a>
                                            </div>
                                            <div class="htc__list__details">
                                                
                                                <h2><a href="product-details.html">{{$product->product_name}} BDT</a></h2>
                                                <ul  class="pro__prize">
                                                    <li class="old__prize">{{$product->product_price}} BDT</li>
<!--                                                    <li>$75.2</li>-->
                                                </ul>
                                                
<!--                                                <ul class="rating">
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                </ul>-->
                                                <p>{{$product->product_short_description}} </p>
                                                <div class="fr__list__btn">
                                                    <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End List Product -->
                                         @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product View -->
                </div>
                
                
                
                
                
                
                
                
                <!-- Start Pagenation -->
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="htc__pagenation">
                            <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li> 
                            <li class="active"><a href="#">1</a></li> 
                            <li ><a href="#">3</a></li>   
                            <li><a href="#">19</a></li> 
                            <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li> 
                        </ul>
                    </div>
                </div>
                <!-- End Pagenation -->
            </div>








            <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                <div class="htc__product__leftsidebar">






                    <!-- Start Prize Range -->
                    <div class="htc-grid-range">
                        <h4 class="title__line--4">Price</h4>
                        <div class="content-shopby">
                            <div class="price_filter s-filter clear">
                                <form action="#" method="GET">
                                    <div id="slider-range"></div>
                                    <div class="slider__range--output">
                                        <div class="price__output--wrap">
                                            <div class="price--output">
                                                <span>Price :</span><input type="text" id="amount" readonly>
                                            </div>
                                            <div class="price--filter">
                                                <a href="#">Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Prize Range -->






                    <!-- Start Category Area -->
                    <div class="htc__category">
                        <h4 class="title__line--4">categories</h4>
                        <ul class="ht__cat__list">
                            <li><a href="#">Clothing</a></li>
                            <li><a href="#">Bags</a></li>
                            <li><a href="#">Shoes</a></li>
                            <li><a href="#">Jewelry</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Food / Drink Store</a></li>
                            <li><a href="#">Gift Store</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Watch</a></li>
                            <li><a href="#">Other</a></li>
                        </ul>
                    </div>
                    <!-- End Category Area -->

                    <!-- Start Pro Color -->
                    <div class="ht__pro__color">
                        <h4 class="title__line--4">color</h4>
                        <ul class="ht__color__list">
                            <li class="grey"><a href="#">grey</a></li>
                            <li class="lamon"><a href="#">lamon</a></li>
                            <li class="white"><a href="#">white</a></li>
                            <li class="red"><a href="#">red</a></li>
                            <li class="black"><a href="#">black</a></li>
                            <li class="pink"><a href="#">pink</a></li>
                        </ul>
                    </div>
                    <!-- End Pro Color -->
                    <!-- Start Pro Size -->
                    <div class="ht__pro__size">
                        <h4 class="title__line--4">Size</h4>
                        <ul class="ht__size__list">
                            <li><a href="#">xs</a></li>
                            <li><a href="#">s</a></li>
                            <li><a href="#">m</a></li>
                            <li><a href="#">reld</a></li>
                            <li><a href="#">xl</a></li>
                        </ul>
                    </div>
                    <!-- End Pro Size -->


                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Grid -->
<!-- Start Brand Area -->
<div class="htc__brand__area bg__cat--4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ht__brand__inner">
                    <ul class="brand__list owl-carousel clearfix">
                        <li><a href="#"><img src="{{asset('public/frontEnd/')}}/images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="{{asset('public/frontEnd/')}}/images/brand/2.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="{{asset('public/frontEnd/')}}/images/brand/3.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="{{asset('public/frontEnd/')}}/images/brand/4.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="{{asset('public/frontEnd/')}}/images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="{{asset('public/frontEnd/')}}/images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="{{asset('public/frontEnd/')}}/images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="{{asset('public/frontEnd/')}}/images/brand/2.png" alt="brand images"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Brand Area -->
<!-- Start Banner Area -->
<div class="htc__banner__area">
    <ul class="banner__list owl-carousel owl-theme clearfix">
        <li><a href="product-details.html"><img src="{{asset('public/frontEnd/')}}/images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="{{asset('public/frontEnd/')}}/images/banner/bn-3/2.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="{{asset('public/frontEnd/')}}/images/banner/bn-3/3.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="{{asset('public/frontEnd/')}}/images/banner/bn-3/4.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="{{asset('public/frontEnd/')}}/images/banner/bn-3/5.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="{{asset('public/frontEnd/')}}/images/banner/bn-3/6.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="{{asset('public/frontEnd/')}}/images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="{{asset('public/frontEnd/')}}/images/banner/bn-3/2.jpg" alt="banner images"></a></li>
    </ul>
</div>
<!-- End Banner Area -->
<!-- End Banner Area -->
<!-- Start Footer Area -->


@endsection