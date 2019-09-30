
@extends('frontEnd.master')
@section('mainContent')




<!--header-->
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="{{url('/')}}">Home</a> / <span>Payment Information</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
                    
                    <div  <div class="well" style="">
                        <h4> You have to give us Payment information to complete your valuable order. 
                        </h4>
                          <br><br>
                    </div>
                    
			 <div class="container">
<!--        <h3>My Shopping Bag</h3>-->
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
         
                 {!! Form::open(['url'=>'/checkout/save-order','method'=>'POST','name'=>'editForm']) !!}
                              <table class="table table-bordered table-hover ">
                                  <tr>
                                      <td colspan="2"><br><h2 class="text-center text-success">Select your payment method </h2></br></td>
                                  </tr>
                                  <tr>
                                      <td> <b>Cash On Delivery</b></td>
                                      <td><input type='radio' name='payment_type' value="CashOnDelivery" ></td>
                                  </tr>
                                  <tr>
                                      <td><b> Paypal</b></td>
                                      <td><input type='radio' name='payment_type'value="Paypal" ></td>
                                  </tr>
                                  <tr>
                                      <td><b> Bkash</b></td>
                                      <td><input type='radio' name='payment_type'value="Bkash" ></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td><input type='submit' name='payment' value="Confirm Order" class="btn btn-warning" ></td>
                                  </tr>
                              </table> 
               {!! Form::close() !!}
        </div>
    </div>
		</div>
		<!--content-->
                
                
                @endsection