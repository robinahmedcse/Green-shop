
@extends('frontEnd.master')
@section('mainContent')


<?php
$cartCollection = Cart::getContent();
// echo"<pre>";
// print_r($cartCollection);
// exit();
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
                            <span class="breadcrumb-item active">shopping cart</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">               
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">products</th>
                                    <th class="product-name">name of products</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($cartCollection as $cart)
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{ URL::to($cart->attributes['image'] ) }}" alt="product img" /></a></td>
                                    <td class="product-name"><a href="#">{{$cart->name}}</a>
                                        <ul  class="pro__prize">
                                            <!-- <li class="old__prize">$82.5</li> -->
                                            <li>{{$cart->price}} BDT</li>
                                        </ul>
                                    </td>
                                    <td class="product-price"><span class="amount">{{$cart->price}} BDT</span></td>

                                    <td class="product-quantity">
                                        <input type="number" value="{{$cart->quantity}}"name="product_quantity" disabled="disabled" />

                                    </td>




                                    <td class="product-subtotal"> 
                                        {{$cart->price * $cart->quantity}}
                                        BDT</td>
                                    <td class="product-remove"><a href="{{URL::to('/delete/cart/'.$cart->id)}}"><i class="icon-trash icons"></i></a></td>
                                </tr>



                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    
                    
                    
                    
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="{{URL::to('/')}}">Continue Shopping</a>
                                </div>

                                <div class="buttons-cart checkout--btn">
                                    <!--        <a href="#">update</a> -->
                               
                                       <?php 
                           $customer_id = Session::get('user_customer_id');
                           $shippingId = Session::get('user_shipping_id');
                           
                          // echo 'coustomet id '.$customer_id ;
                         //   echo 'ship id '.$shippingId ;
                         //  exit();
                           
                            
                            if($customer_id == NULL && $shippingId == NULL){
                           ?>
                                    
                            <a href="{{URL::to('/checkout/products')}}">Continue</a>
                              
                             <?php } 
                             elseif ($customer_id != NULL && $shippingId == NULL) {
                            ?>    
                                 <a href="{{URL::to('/checkout/shipping')}}">Continue</a>
                                 
                             <?php                            
                             }elseif ($customer_id != NULL && $shippingId != NULL) {
                          ?>
                                  <a href="{{URL::to('/checkout/payment')}}">Continue</a>
                                           <?php   }   ?>
                                
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="ht__coupon__code">
                                <span>enter your discount code</span>
                                <div class="coupon__box">
                                    <input type="text" placeholder="">
                                    <div class="ht__cp__btn">
                                        <a href="#">enter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="htc__cart__total">
                                <h6>cart total</h6>
                                <div class="cart__desk__list">
                                    <ul class="cart__desc">
                                        <li>cart total</li>
                                        <li>tax</li>
                                        <li>shipping</li>
                                    </ul>
                                    <ul class="cart__price">
                                        <?php
                                        $subTotal = Cart::getSubTotal();
                                        ?>
                                        <li>{{$subTotal}} BDT</li>
                                        <li>0.00 BDT</li>
                                        <li>
                                            <?php
                                            $shipping_charge = 100;

                                            $cartTotalQuantity = Cart::getTotalQuantity();

                                            $shipping = $shipping_charge * $cartTotalQuantity;

                                            echo $shipping;
                                            ?>
                                            BDT</li>
                                    </ul>
                                </div>
                                <div class="cart__total">
                                    <?php
                                    $total = Cart::getTotal();
                                    $total_amount = $shipping + $total;
                                    ?>
                                    <span>order total</span>
                                    <span><?php
                                        echo $total_amount;
                                        ?> BDT</span>
                                </div>
                                <ul class="payment__btn">
                                                  <?php 
                         
                            
                            if($customer_id == NULL && $shippingId == NULL){
                           ?>
                                    
                         
                              <li class="active"><a href="{{URL::to('/checkout/products')}}">payment</a></li>
                              
                             <?php } 
                             elseif ($customer_id != NULL && $shippingId == NULL) {
                            ?>    
                           
                                   <li class="active"><a href="{{URL::to('/checkout/shipping')}}">payment</a></li>
                                 
                             <?php                            
                             }elseif ($customer_id != NULL && $shippingId != NULL) {
                          ?>
                                
                                    <li class="active"><a href="{{URL::to('/checkout/payment')}}">payment</a></li>
                                           <?php   }   ?>
                                    
                                    
                                    
                                    
                                  
                                    
                                </ul>
                                
                              
                                
                                
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                </form> 
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->
<!-- Start Brand Area -->
<div class="htc__brand__area bg__cat--4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ht__brand__inner">
                    <ul class="brand__list owl-carousel clearfix">
                        <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
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
        <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
    </ul>
</div>
<!-- End Banner Area -->
<!-- End Banner Area -->

@endsection