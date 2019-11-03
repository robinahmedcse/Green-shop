
@extends('frontEnd.master')
@section('mainContent')
 

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
                                <h3>Set Password</h3>
                            </div>
                            <div class="accordion__body">
                                <div class="accordion__body__form">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="checkout-method__login">
                                                {!! Form::open(['url'=>'customer/forget/password/set','method'=>'POST']) !!}



                                                <div class="single-input">
                                                    <label for="user-password">password</label>
                                                    <input  type="password"  name="password" placeholder="Enter Your password"  required="">
                                                </div>
                                                  <div class="single-input">
                                                    <label for="user-password">Confirm password</label>
                                                    <input  type="password"  name="Cpassword" placeholder="Enter Your password again"  required="">
                                                </div>
 

                                                <div class="dark-btn"> 
                                                    <input type="submit" value="Save" class="btn btn-default glyphicon glyphicon-chevron-left">
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