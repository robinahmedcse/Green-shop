 @extends('admin.master')
@section('title')
Edit Category | Admin Panel
@endsection

@section('mainContent')
 
<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">Update Category</h2>
    </div> 
    <div class="">
        <h4 class="tex text-center text-danger">{{Session::get('message')}}</h4>
    </div> 
    
<div class="col-lg-12"style="margin-top: 4%">
    <div class="well" >
       
<!--        <form action="" method="POST"id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
             {!! Form::open(['url'=>'admin/update-category','method'=>'POST','name'=>'editForm','class'=>'form-horizontal form-label-left']) !!}
            <!-- Category name -->
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-name">Category Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$category_by_id->category_name}}" name="category_name" required="required" class="form-control col-md-7 col-xs-12">
                    <input type="hidden" value="{{$category_by_id->category_id}}" name="category_id">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-name">Category Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class='form-control' name='category_description' row='8 '>{{$category_by_id->category_description}}</textarea>
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
                    <input type="submit" name='btn' value="Update Category" class="btn btn-success">
                </div>
            </div>
         {!! Form::close() !!}
    </div>
</div>
</div>    
      


<script>

document.forms['editForm'].elements['publicationStatus'].value={{$category_by_id->publicationStatus}};

</script>
@endsection