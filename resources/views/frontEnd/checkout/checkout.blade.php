
@extends('frontEnd.master')
@section('mainContent')





<?php
$cartCollection = Cart::getContent();
// echo"<pre>";
// print_r($cartCollection);
// exit();
?>


 

<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{asset('public/frontEnd/')}}/images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                Login
                            </div>
                            <div class="accordion__body">  
                                <div class="accordion__body__form">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="checkout-method">
                                                <div class="checkout-method__single">
                                                    <h5 class="checkout-method__title">

                                                        {{Session::get('exception')}}
                                                    </h5>
<!--                                                   <p class="checkout-method__subtitle">Register with us for future convenience:</p>-->


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="checkout-method__login">
                                                {!! Form::open(['url'=>'/checkout/check/customer/login','method'=>'POST']) !!}
                                                <h5 class="checkout-method__title">Login</h5>
                                                <h5 class="checkout-method__title">Already Registered?</h5>
                                                <p class="checkout-method__subtitle">Please login below:</p>
                                                <div class="single-input">
                                                    <label for="user-email">Email Address</label>
                                                    <input type="email" name="email">
                                                </div>
                                                <div class="single-input">
                                                    <label for="user-pass">Password</label>
                                                    <input type="password" name="password">
                                                </div>
                                                <p class="require">* Required fields</p>
                                                <a href="#">Forgot Passwords?</a>
                                                <div class="dark-btn">
                                                    <input type="submit" name="submit" value="Submit" class="btn btn-default glyphicon glyphicon-chevron-left">
                                                </div>
                                                {!! Form::close() !!} 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="accordion__title">
                                Registration 
                            </div>
                            <div class="accordion__body">
                                <div class="bilinfo">
                                    {!! Form::open(['url'=>'/checkout/save/customer','method'=>'POST']) !!}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-input mt-0">
                                                <select name="country"  >
                                                    <option value="select">Select your country</option>
                                                    <option value="Bangladesh">Bangladesh</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input  type="text"  name="customer_first_name" placeholder="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'First Name';
                                                        }" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input  type="text"  name="customer_last_name" placeholder="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'Last Name';
                                                        }" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="single-input">
                                                <input  type="text"  name="address" placeholder="Address" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'Address';
                                                        }" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input  type="text"  name="city" placeholder="City" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'City';
                                                        }" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input  type="text"  name="thana" placeholder="Thana" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'Thana';
                                                        }" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input  type="text"  name="post_office" placeholder="P.O" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'P.O';
                                                        }" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input  type="text"  name="district" placeholder="District" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'District';
                                                        }" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input  type="text"  name="email" placeholder="Email"
                                                        onblur="ajax_email(this.value, 'res');" id="email"   required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input  type="password"  name="password"  placeholder="Password" 
                                                        onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                    this.value = 'Password';
                                                                }" required="">
                                                <span id="res" style=" color: #04448C"></span>
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <input  type="text"  name="phone" placeholder="Phone Number" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = 'Phone Number';
                                                        }" required="">
                                            </div>
                                        </div>

                                    </div>
                                    <br><br>

                                    <div class="dark-btn"> 
                                        <input type="submit" value="Submit" class="btn btn-default glyphicon glyphicon-chevron-left">
                                    </div>
                                    {!! Form::close() !!} 
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
                            <?php $subTotal = Cart::getSubTotal(); ?>
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

@endsection