
@extends('frontEnd.master')
@section('mainContent')


<?php 

                
//     echo '<pre>';
//       print_r($publishedManProducts);
//       exit();
       

?>

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
    
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
      




        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                
           @foreach($publishedBaner as $banner)        
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                      
                                        <h1>{{$banner->banner_description}}</h1>
                                        <div class="cr__btn">
                                            <a href="{{URL::to('/show/cart')}}">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="{{asset($banner ->banner_image_url)}}" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
             @endforeach
             
            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->






        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <!-- Start Single Category -->


                            @foreach($publishedProducts as $publishedProduct)
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <?php
  $x=$publishedProduct->product_name;
 $xc=strtolower($x);
  //echo $xc;
  
  $xx=preg_replace('/\s+/', '-',  $xc);
  //echo   $xx;
 // exit();
?>
                                       <a href="{{URL::to($xx.'/product-details/'.$publishedProduct->product_id)}}" target="_blank">
                                            <img src="{{$publishedProduct->image_url}}" alt="product images">
                                        </a>
                                    </div>

                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                          <!--   <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li> -->

                                            <li><a href="{{URL::to('/add/to/cart/'.$publishedProduct->product_id)}}"><i class="icon-handbag icons"></i></a></li>

                                          <!--   <li><a href="#"><i class="icon-shuffle icons"></i></a></li> -->
                                        </ul>
                                    </div>

                                    
                                    <div class="fr__product__inner">
                                        <h4><a href="{{URL::to($xx.'/product-details/'.$publishedProduct->product_id)}}" target="_blank">{{$publishedProduct->product_name}}</a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize">{{$publishedProduct->product_price}} BDT</li>
                                            <!-- <li>$25.9</li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                           

 @endforeach

                            <!-- End Single Category -->
                        </div>

   
                    </div>
                </div>
            </div>
        </section>










        <!-- End Category Area -->
        <!-- Start Prize Good Area -->
<!--        <section class="htc__good__sale bg__cat--3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="fr__prize__inner">
                            <h2>Contrary to popular belief is simply rand.</h2>
                            <h3>Professor at Hamp deny dney College.</h3>
                            <a class="fr__btn" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="prize__inner">
                            <div class="prize__thumb">
                                <img src="{{asset('public/frontEnd/')}}/images/banner/big-img/1.png" alt="banner images">
                            </div>
                            <div class="banner__info">
                                <div class="pointer__tooltip pointer--3 align-left">
                                    <div class="tooltip__box">
                                        <h4>Tooltip Left</h4>
                                        <p>Lorem ipsum pisaci volupt atem accusa saes ntisdumtiu loperm asaerks.</p>
                                    </div>
                                </div>
                                <div class="pointer__tooltip pointer--4 align-top">
                                    <div class="tooltip__box">
                                        <h4>Tooltip Top</h4>
                                        <p>Lorem ipsum pisaci volupt atem accusa saes ntisdumtiu loperm asaerks.</p>
                                    </div>
                                </div>
                                <div class="pointer__tooltip pointer--5 align-bottom">
                                    <div class="tooltip__box">
                                        <h4>Tooltip Bottom</h4>
                                        <p>Lorem ipsum pisaci volupt atem accusa saes ntisdumtiu loperm asaerks.</p>
                                    </div>
                                </div>
                                <div class="pointer__tooltip pointer--6 align-top">
                                    <div class="tooltip__box">
                                        <h4>Tooltip Bottom</h4>
                                        <p>Lorem ipsum pisaci volupt atem accusa saes ntisdumtiu loperm asaerks.</p>
                                    </div>
                                </div>
                                <div class="pointer__tooltip pointer--7 align-top">
                                    <div class="tooltip__box">
                                        <h4>Tooltip Bottom</h4>
                                        <p>Lorem ipsum pisaci volupt atem accusa saes ntisdumtiu loperm asaerks.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- End Prize Good Area -->
        <!-- Start Product Area -->








        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Women  Collection</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <!-- Start Single Category -->




  @foreach($publishedWomenProducts as $publishedProduct)
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                        <?php
  $x=$publishedProduct->product_name;
 $xc=strtolower($x);
  //echo $xc;
  
  $xx=preg_replace('/\s+/', '-',  $xc);
  //echo   $xx;
 // exit();
?>
     

                                <div class="ht__cat__thumb">
                                     <a href="{{URL::to($xx.'/product-details/'.$publishedProduct->product_id)}}" target="_blank">
                                            <img src="{{$publishedProduct->image_url}}" alt="product images">
                                        </a>
 
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="{{URL::to($xx.'/product-details/'.$publishedProduct->product_id)}}" target="_blank">{{$publishedProduct->product_name}}</a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">{{$publishedProduct->product_price}} BDT</li>
                                       <!--  <li>$25.9</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>

 @endforeach          
                        <!-- End Single Category -->
                        <!-- Start Single Category -->
                       
                        
                        <!-- End Single Category -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
        <!-- Start Testimonial Area -->
        
        <section class="htc__testimonial__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="ht__testimonial__activation clearfix">

                    </div>
                </div>
            </div>
        </section>

        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Man Collection</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <!-- Start Single Category -->




  @foreach($publishedManProducts as $publishedProduct)
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                        <?php
  $x=$publishedProduct->product_name;
 $xc=strtolower($x);
  //echo $xc;
  
  $xx=preg_replace('/\s+/', '-',  $xc);
  //echo   $xx;
 // exit();
?>
     

                                <div class="ht__cat__thumb">
                                     <a href="{{URL::to($xx.'/product-details/'.$publishedProduct->product_id)}}" target="_blank">
                                            <img src="{{$publishedProduct->image_url}}" alt="product images">
                                        </a>
 
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="{{URL::to($xx.'/product-details/'.$publishedProduct->product_id)}}" target="_blank">{{$publishedProduct->product_name}}</a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">{{$publishedProduct->product_price}} BDT</li>
                                       <!--  <li>$25.9</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>

 @endforeach          
                        <!-- End Single Category -->
                        <!-- Start Single Category -->
                       
                        
                        <!-- End Single Category -->
                    </div>
                </div>
            </div>
        </section>




 
        <!-- End Testimonial Area -->
        <!-- Start Top Rated Area -->
        
<!--        <section class="top__rated__area bg__white pt--100 pb--110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Top Rated</h2>
                            <p>But I must explain to you</p>
                        </div>
                    </div>
                </div>
                <div class="row mt--20">
                     Start Single Product 
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="htc__best__product">
                            <div class="htc__best__pro__thumb">
                                <a href="product-details.html">
                                    <img src="{{asset('public/frontEnd/')}}/images/product-2/sm-img-2/1.jpg" alt="small product">
                                </a>
                            </div>
                            <div class="htc__best__product__details">
                                <h2><a href="product-details.html">dummy Product title</a></h2>
                                <ul class="rating">
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                </ul>
                                <ul  class="top__pro__prize">
                                    <li class="old__prize">$82.5</li>
                                    <li>$75.2</li>
                                </ul>
                                <div class="best__product__action">
                                    <ul class="product__action--dft">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>
                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>
                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                     End Single Product 
                     Start Single Product 
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="htc__best__product">
                            <div class="htc__best__pro__thumb">
                                <a href="product-details.html">
                                    <img src="{{asset('public/frontEnd/')}}/images/product-2/sm-img-2/2.jpg" alt="small product">
                                </a>
                            </div>
                            <div class="htc__best__product__details">
                                <h2><a href="product-details.html">dummy Product title</a></h2>
                                <ul class="rating">
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                </ul>
                                <ul  class="top__pro__prize">
                                    <li class="old__prize">$82.5</li>
                                    <li>$75.2</li>
                                </ul>
                                <div class="best__product__action">
                                    <ul class="product__action--dft">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>
                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>
                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                     End Single Product 
                     Start Single Product 
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="htc__best__product">
                            <div class="htc__best__pro__thumb">
                                <a href="product-details.html">
                                    <img src="{{asset('public/frontEnd/')}}/images/product-2/sm-img-2/3.jpg" alt="small product">
                                </a>
                            </div>
                            <div class="htc__best__product__details">
                                <h2><a href="product-details.html">dummy Product title</a></h2>
                                <ul class="rating">
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                </ul>
                                <ul  class="top__pro__prize">
                                    <li class="old__prize">$82.5</li>
                                    <li>$75.2</li>
                                </ul>
                                <div class="best__product__action">
                                    <ul class="product__action--dft">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>
                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>
                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                     End Single Product 
                </div>
            </div>
        </section>-->
        
        
        
        
        <!-- End Top Rated Area -->
        <!-- Start Brand Area -->
    
 
@endsection