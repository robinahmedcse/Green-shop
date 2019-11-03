
@extends('frontEnd.master')
@section('mainContent')
<?php 

$cartCollection = Cart::getContent();
// echo"<pre>";
// print_r($cartCollection);
// exit();
?>
 
 
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
                                
                            </div>
                            <div class="accordion__body">
                                <div class="accordion__body__form">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="checkout-method__login">
                                                 {!! Form::open(['url'=>'customer/forget/password/check','method'=>'POST']) !!}
                                                  
                                                 

                                                    <div class="single-input">
                                                        <label for="user-email">Email</label>
                                                        <input  type="email"  name="email" placeholder="Enter Your Phone"  required="">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="user-pass">Phone Number</label>
                                                       <input  type="text"  name="phone"  placeholder="Enter Your Phone Number"  required="">
                                                    </div>
                                                 
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
<!-- cart-main-area end -->
 
@endsection