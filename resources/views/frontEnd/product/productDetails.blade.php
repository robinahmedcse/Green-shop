
@extends('frontEnd.master')
@section('mainContent')

<?php 

//echo "string";
//echo '<pre>';
//print_r($published_product_by_id);
$get_product_id=$published_product_by_id->product_id;

//echo $get_product_id;
//exit();
?>

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
                                  <a class="breadcrumb-item" href="product-grid.html">Products</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">{{$published_product_by_id->product_name}}
                                 </span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">

                                    <?php
                                    $images = DB::table('tbl_product_images')
                                            ->where('product_id', $get_product_id)
                                            ->select('tbl_product_images.*')
                                            ->get();

//                                           echo '<pre>';
// print_r($images);
// exit();
                                    ?>
                                       @foreach($images as $image)

                                       <?php 
                                       if($image->image_label == "1"){
                                         ?>

                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="../../{{$image->image_url}} " alt="full-image">
                                        </div>
                                        
                                         <?php 
                                         }
                                        elseif($image->image_label == "2"){
                                         ?>
                                        

                                        <div role="tabpanel" class="tab-pane fade" id="img-tab-2">
                                            <img src="../../{{$image->image_url}}" alt="full-image">
                                        </div>

                                          <?php 
                                        }
                                        else{
                                         ?>
                                    
                                        
                                        <div role="tabpanel" class="tab-pane fade" id="img-tab-3">
                                            <img src="../../{{$image->image_url}}" alt="full-image">
                                        </div>
                                          <?php 
                                        }
                                         ?>
                                  
                                   
                                     @endforeach
                                    </div>
                                </div>

                                <!-- End Product Big Images -->
                                <!-- Start Small images -->
                                <ul class="product__small__images" role="tablist">
   @foreach($images as $image)

                                       <?php 
                                       if($image->image_label == "1"){
                                         ?>

                                    <li role="presentation" class="pot-small-img active">
                                        <a href="#img-tab-1" role="tab" data-toggle="tab">
                                            <img src="../../{{$image->image_url}}" alt="small-image">
                                        </a>
                                    </li>

                                    <?php 
                                         }
                                        elseif($image->image_label == "2"){
                                         ?>
                                        


                                    <li role="presentation" class="pot-small-img">
                                        <a href="#img-tab-2" role="tab" data-toggle="tab">
                                            <img src="../../{{$image->image_url}}" alt="small-image">
                                        </a>
                                    </li>

                                          <?php 
                                        }
                                        else{
                                         ?>
                                    

                                    <li role="presentation" class="pot-small-img">
                                        <a href="#img-tab-3" role="tab" data-toggle="tab">
                                            <img src="../../{{$image->image_url}}" alt="small-image">
                                        </a>
                                    </li>
      <?php 
                                        }
                                         ?>
                                  
                                   
                                     @endforeach

                                </ul>
                                <!-- End Small images -->
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2>{{$published_product_by_id->product_name}}</h2>
                                <h6>Model: <span>MNG001</span></h6>
                              
                                <ul  class="pro__prize">
                                    <!-- <li class="old__prize">$82.5</li> -->
                                    <li>Product Price: {{$published_product_by_id->product_price}} BDT</li>
                                </ul>
                                <p class="pro__info">{{$published_product_by_id->product_short_description}}</p>
                                <div class="ht__pro__desc">
                                    
                                    <div class="sin__desc">
                                        <p><span>Availability:</span> 

                                            <?php 
                                                $product_quantity=$published_product_by_id->product_quantity;
                                     ?>

                                             @if( $product_quantity>0)
                                                  In Stock
                                                  @elseif(product_quantity<5)
                                                   Limited(Hurry Up)
                   
                                                @else
                                                 Out Of Stock 
                                                 @endif


                                        </p>
                                    </div>




                             <div class="color-quality">
                                {!! Form::open(['url'=>'/add/to/cart/'.$published_product_by_id->product_id,'method'=>'POST' ]) !!}
                                <input type='hidden' name="product_id" value='{{$published_product_by_id->product_id}}' class='form-control ' ></input>
                                <h6>Quality :</h6>
                                
                                <div class="quantity"> 
                                    <div class="quantity-select col-md-4">                           
                                        <input type='text' name="qty" class='form-control' value="1"></input>
                                    </div>
                                </div>
                            </div>
                           
                            
                            <div class="women">
                                  
                                  <button class="my-cart-b item_add"><i class="icon-handbag icons"> </i> Add To Cart</button>                             
                            </div>
                            {!! Form::close() !!}


                                   
                                    <div class="sin__desc align--left">
                                        <p><span>size: </span>{{$published_product_by_id->product_size}}</p>
                                        <!-- <select class="select__size">
                                            <option>s</option>
                                            <option>l</option>
                                            <option>xs</option>
                                            <option>xl</option>
                                            <option>m</option>
                                            <option>s</option>
                                        </select> -->
                                    </div>

                                    <div class="sin__desc align--left">
                                        <p><span>Brand:</span></p>
                                        <ul class="pro__cat__list">
                                            
                                            <li><a href="#">{{$published_product_by_id->manufacture_name}}</a></li>
                                           
                                        </ul>
                                    </div>
                                 
                                         <div class="sin__desc product__share__link">
                                        <p><span>Share this:</span></p>
                                        <ul class="pro__share">
                                            <li><a href="#" target="_blank"><i class="icon-social-twitter icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-facebook icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-google icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-linkedin icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-pinterest icons"></i></a></li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                            <li role="presentation" class="review"><a href="#review" role="tab" data-toggle="tab">review</a></li>
                            <li role="presentation" class="shipping"><a href="#shipping" role="tab" data-toggle="tab">shipping</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    
                                    <h4 class="ht__pro__title">Description</h4>
                                    <p>{{$published_product_by_id->product_long_description}}
                                    </p>
                                    

                                    
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            
                          <!--   <div role="tabpanel" id="review" class="pro__single__content tab-pane fade">
                                <div class="pro__tab__content__inner">
                                    <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra Alvarez’s label, Alix, hits that mark with its range of comfortable, minimal, and neutral-hued bodysuits.</p>
                                    <h4 class="ht__pro__title">Description</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                    <h4 class="ht__pro__title">Standard Featured</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p>
                                </div>
                            </div>
 -->
                            <!-- End Single Content -->
                            <!-- Start Single Content -->

                           <!--  <div role="tabpanel" id="shipping" class="pro__single__content tab-pane fade">
                                <div class="pro__tab__content__inner">
                                    <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra Alvarez’s label, Alix, hits that mark with its range of comfortable, minimal, and neutral-hued bodysuits.</p>
                                    <h4 class="ht__pro__title">Description</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                    <h4 class="ht__pro__title">Standard Featured</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p>
                                </div> -->


                         
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
       










       <!-- Start Product Area -->
        <section class="htc__product__area--2 pb--100 product-details-res">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <!-- Start Single Product -->

                        @foreach($publishedProducts as $publishedProduct)
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
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
                                        <img src="../../{{$publishedProduct->image_url}}" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        
                                </div>
                                <div class="fr__product__inner">
                                    <h4>  <a href="{{URL::to($xx.'/product-details/'.$publishedProduct->product_id)}}" target="_blank">{{$publishedProduct->product_name}}</a></h4>
                                    <ul class="fr__pro__prize">
                                       <!--  <li class="old__prize">$30.3</li> -->
                                        <li>{{$publishedProduct->product_price}} BDT</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                         @endforeach  
                        <!-- End Single Product -->
                        <!-- Start Single Product -->
                       
                        <!-- End Single Product -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->







        <!-- Start Banner Area -->
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
        <!-- End Banner Area -->
        <!-- End Banner Area -->
        <!-- Start Footer Area -->

 

    @endsection