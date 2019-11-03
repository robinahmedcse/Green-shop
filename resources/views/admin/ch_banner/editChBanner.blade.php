 @extends('admin.master')


@section('mainContent')
 
<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">Update Checkout Banner</h2>
    </div> 
    <div class="">
        <h4 class="tex text-center text-danger"> </h4>
    </div> 
    
<div class="col-lg-12"style="margin-top: 4%">
    <div class="well" >
       
<!--        <form action="" method="POST"id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
             {!! Form::open(['url'=>'/wp-admin/master/banner/checkout/update/','method'=>'POST','name'=>'editForm','class'=>'form-horizontal form-label-left','enctype'=>'multipart/form-data']) !!}
            <!-- Category name -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="banner-description">Banner Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$banner_by_id->checkout_pro_name}}"  name="banner_description" required class="form-control col-md-7 col-xs-12">
                    <input type="hidden" value="{{$banner_by_id->checkout_pro_id}}" name="banner">
                        
                </div>
            </div> 
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Publication Status*</label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <select name="banner_publication_status" class="form-control" required>
                        <option value="0">Select Publication Status</option>
                        <option value="1">Published</option>
                        <option value="0">UnPublished</option>
                    </select>
                </div>
            </div>  
             
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="banner-image">Image<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" name="banner_image" accept="image/*" /><br>

                </div>
            </div>
            
            
                  <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for=" ">Previous photo <span class="required"></span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                    
             
                      <img src="{{ asset($banner_by_id->checkout_pro_image_url)}}" width="400px">
              
                 </div>
             </div>
            
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                    <input type="submit" name='btn' value="Update Banner" class="btn btn-success">
                </div>
            </div>
         {!! Form::close() !!}
    </div>
</div>
</div>    
      
<script>

document.forms['editForm'].elements['banner_publication_status'].value={{$banner_by_id->publication_status}};

</script>
 
@endsection