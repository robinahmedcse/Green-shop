@extends('admin.master')


@section('mainContent')
 
<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">Add Man Product Banner</h2>
    </div> 
    <div class="">
      
    </div> 
    
<div class="col-lg-12"style="margin-top: 4%">
    <div class="well" >
       
<!--        <form action="" method="POST"id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
             {!! Form::open(['url'=>'/wp-admin/master/banner/man/save','method'=>'POST','class'=>'form-horizontal form-label-left','enctype'=>'multipart/form-data']) !!}
         
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="banner-description">Man Banner Nmae <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class='form-control' name='banner_description' row='15'></textarea>

                       <span class="text-danger">{{$errors->has('man_banner_description')? $errors->first('man_banner_description'):''}}</span>
                </div>
            </div> 
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Publication Status*</label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <select name="banner_publication_status" class="form-control">
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
                     <input type="file" name="man_banner_image" accept="image/*" /><br>
                     
                 </div>
             </div>
             
            
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                    <input type="submit" name='btn' value="Save Man Banner" class="btn btn-success">
                </div>
            </div>
         {!! Form::close() !!}
    </div>
</div>
</div>    
             
@endsection