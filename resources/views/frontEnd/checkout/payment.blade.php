
@extends('frontEnd.master')
@section('mainContent')

<?php 

$cartCollection = Cart::getContent();
// echo"<pre>";
// print_r($cartCollection);
// exit();

  $banner_peoduct=DB::table('tbl_checkout_pro')
                ->where('publication_status', 1)
                ->first();
  
  
  if ($banner_peoduct == NULL) {
            $ban_image = 'Nai';
        } else {
             $ban_image =$banner_peoduct->checkout_pro_image_url;
        }
  


?>
                        <!-- Start Bradcaump area -->
      <?php if ($ban_image == 'Nai') {  ?>
  <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0)  no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner">
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{URL::to('/')}}">Home</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">Payment</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{asset($ban_image)}}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner">
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{URL::to('/')}}">Home</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">Payment</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

                        
                        
                        
                        
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    <div class="accordion__title">
                                        payment information
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                             
                                            <div class="single-method">
                                                <a href="#" class="paymentinfo-credit-trigger"><i class="zmdi zmdi-long-arrow-right"></i>Payment Method</a>
                                            </div>
                                            <div class="paymentinfo-credit-content">
                                                 {!! Form::open(['url'=>'/checkout/save/order','method'=>'POST','name'=>'editForm']) !!}
                                                    <div class="row">
                                                       
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <select name="payment" id="payment-info-type">
                                                                     <option value="CashOnDelivery">Select Payment Method</option>
                                                                    <option value="CashOnDelivery">Cash On Delivery</option>
                                                                    <option value="Bkash">Bkash</option>
                                                                    <option value="Rocket">Rocket</option>
                                                                     
                                                                </select>
                                                            </div>
                                                        </div>
                                                          <br><br>           
                                         <div class="single-input">
                                             
                                             <input type="submit" value="Submit" class="btn btn-default glyphicon glyphicon-chevron-left">
                                         </div>
                                                        
                                                      
                                                    </div>
                                               {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                  <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5> 
                    <div class="order-details__item">
                           @foreach($cartCollection as $cart)
                        <div class="single-item">
                            <div class="single-item__thumb">
                                <img src="{{ URL::to($cart->attributes['image'] ) }}" alt="ordered item">
                            </div>
                            <div class="single-item__content">
                                <a href="#">{{$cart->name}}</a>
                                <span class="price">{{$cart->price}} BDT</span>
                            </div>
                            <div class="single-item__remove">
                                <a href="{{URL::to('/delete/cart/'.$cart->id)}}"><i class="zmdi zmdi-delete"></i></a>
                            </div>
                        </div>
                            @endforeach
                    </div>
                          
                    
                    <div class="order-details__count">
                        <div class="order-details__count__single">
                            <?php   $subTotal = Cart::getSubTotal();  ?>
                            <h5>sub total</h5>
                            <span class="price">{{$subTotal}} BDT</span>
                        </div>
                        <div class="order-details__count__single">
                            <h5>Tax</h5>
                            <span class="price">0.00 BDT</span>
                        </div>
                        <div class="order-details__count__single">
                            <h5>Shipping</h5>
                                <span class="price">

                                    <?php
$shipping_charge = 100;

$cartTotalQuantity = Cart::getTotalQuantity();

$shipping = $shipping_charge * $cartTotalQuantity;

echo $shipping;
?>
                                            BDT
                            </span>
                        </div>
                    </div>
                    <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span class="price">
                            <?php
$total = Cart::getTotal();
$total_amount = $shipping + $total;
echo $total_amount;


?>
    BDT
                            </span>
                    </div>
                </div>
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
                @endsection