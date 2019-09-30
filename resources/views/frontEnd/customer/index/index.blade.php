
@extends('frontEnd.customer.userMaster')

@section('title')
New-shop | Customer Panel
@endsection


@section('mainContent')
   <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
       
       
       <h3>Hello, {{Session::get('user_customer_name')}}</h3>
                <!-- /.col-lg-12 -->
            </div>
         
@endsection