@extends('admin.master')

@section('title')
Edit mini Category | Admin Panel
@endsection


@section('mainContent')
 
<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">Edit Sub Category</h2>
    </div> 
    <div class="">
        <h4 class="tex text-center text-danger">{{Session::get('Mini_message')}}</h4>
    </div> 
    
<div class="col-lg-12"style="margin-top: 4%">
    <div class="well" >
       
<!--        <form action="" method="POST"id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
             {!! Form::open(['url'=>'/wp-admin/master/category/mini/update','method'=>'POST','name'=>'editForm','class'=>'form-horizontal form-label-left']) !!}
            <!-- Category name -->
            
         
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-name">Mini Category Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" value="{{$mini_categories->mini_category_id}}" name="mini_category_id" class="form-control col-md-7 col-xs-12">
                    <input type="text" value="{{$mini_categories->mini_category_name}}" name="mini_category_name" class="form-control col-md-7 col-xs-12">
                    <span class="text-danger">{{$errors->has('mini_category_name')? $errors->first('mini_category_name'):''}}</span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-description">Mini Category Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class='form-control'   name='mini_category_description' row='8 '>{{$mini_categories->mini_category_description}}</textarea>
                       <span class="text-danger">{{$errors->has('mini_category_description')? $errors->first('mini_category_description'):''}}</span>
                </div>
            </div> 
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Publication Status</label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <select name="publicationStatus" class="form-control">
                        <option value="0">Select Publication Status</option>
                        <option value="1">Published</option>
                        <option value="0">UnPublished</option>
                    </select>
                </div>
            </div>  
            
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                    <input type="submit" name='btn' value="Update Mini Category" class="btn btn-success">
                </div>
            </div>
         {!! Form::close() !!}
    </div>
</div>
</div>    
     <script>

document.forms['editForm'].elements['publicationStatus'].value={{$mini_categories->mini_category_publicationStatus}};

</script>

@endsection