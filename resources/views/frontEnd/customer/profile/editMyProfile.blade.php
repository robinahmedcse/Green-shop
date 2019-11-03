
@extends('frontEnd.customer.userMaster')

@section('title')
Green shop | Customer Panel
@endsection


@section('mainContent')
   
<?php 
            //  echo '<pre>';
            //  print_r($myProfile);    
            // exit();

?> 

<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">Update Profile</h2>
    </div> 
   
    
<div class="col-lg-12"style="margin-top: 4%">
    <div class="well" >
       
<!--        <form action="" method="POST"id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
             {!! Form::open(['url'=>'customer/profile/update/ ','method'=>'POST','name'=>'editForm','class'=>'form-horizontal form-label-left']) !!}
            <!--  name -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$myProfile->customer_name}} " name="name" required="required" class="form-control col-md-7 col-xs-12">
                    <input type="hidden" value="{{$myProfile->customer_id}}" name="customer_id">
                </div>
            </div>
 
 


    <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$myProfile->address}} " name="address" required="required" class="form-control col-md-7 col-xs-12">
                    
                </div>
            </div>


                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city">City<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$myProfile->city}} " name="city" required="required" class="form-control col-md-7 col-xs-12">
                    
                </div>
            </div>
 



                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="thana">Thana<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$myProfile->thana}} " name="thana" required="required" class="form-control col-md-7 col-xs-12">
                    
                </div>
            </div>
 



                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p.o">P.O<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$myProfile->post_office}} " name="po" required="required" class="form-control col-md-7 col-xs-12">
                    
                </div>
            </div>




                   <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="district">District<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$myProfile->district}} " name="district" required="required" class="form-control col-md-7 col-xs-12">
                    
                </div>
            </div>
 


                   <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$myProfile->country}} " name="country" required="required" class="form-control col-md-7 col-xs-12">
                    
                </div>
            </div>



                   <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone Number<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$myProfile->phone}} " name="phone" required="required" class="form-control col-md-7 col-xs-12">
                    
                </div>
            </div>


 
         
            
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                    <input type="submit" name='btn' value="Update Profile" class="btn btn-success">
                </div>
            </div>
         {!! Form::close() !!}
    </div>
</div>
</div>    
      


<script>

 

</script>
 
@endsection