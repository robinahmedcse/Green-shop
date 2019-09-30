
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
                                shipping information
                            </div>
                            <div class="accordion__body">
                                <div class="shipinfo">
                                    
                                    <h3 class="shipinfo__title">Shipping Address</h3>
                                    <p><b>Name:</b> {{ $customer_info->customer_name}}</p>
                                    <p><b>Address:</b> {{$customer_info->address}}, {{$customer_info->city}},{{$customer_info->thana}},{{$customer_info->district}}-{{$customer_info->post_office}}, {{$customer_info->country}}.</p>
<br>
<p style="color: red"> If above ‍address is your shipping address then click on "Submit shipping"   </p>
                                        {!! Form::open(['url'=>'/checkout/shipping/save','method'=>'POST']) !!}
                                         <div class="dark-btn"> 
                                             <input type="hidden" name="customer_id" value="{{$customer_info->customer_id}}">
                                             <input type="hidden" name="customer_check" value="same">
                                             <input type="submit" name="s_submit" value="Submit shipping" class="btn btn-default glyphicon glyphicon-chevron-left">
                                         </div>
				       {!! Form::close() !!} 

                                    <a href="#" class="ship-to-another-trigger"><i class="zmdi zmdi-long-arrow-right"></i>Ship to another address</a>
                                    <div class="ship-to-another-content">
                                       {!! Form::open(['url'=>'/checkout/shipping/save/','method'=>'POST']) !!}
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
                                                    <input type="hidden" name="customer_u_id" value="{{$customer_info->customer_id}}">
                                                    
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
                                                    <input  type="text"  name="phone" placeholder="Phone Number" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                this.value = 'Phone Number';
                                                            }" required="">
                                                </div>
                                            </div>
                                        
                                           <br><br>           
                                         <div class="dark-btn"> 
                                             
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
                     <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span class="price">
                            <?php
$shipping_charge = 100;
$cartTotalQuantity = Cart::getTotalQuantity();
$shipping = $shipping_charge * $cartTotalQuantity;

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