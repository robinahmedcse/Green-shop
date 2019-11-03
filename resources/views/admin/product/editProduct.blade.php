@extends('admin.master')


@section('mainContent')
 
<?php 

//        echo '<pre>';
//       print_r($product_by_id);
//       exit();

$productImageById=DB::table('tbl_products')
               ->join('tbl_product_images','tbl_products.product_id','=', 'tbl_product_images.product_id')
                ->select('tbl_product_images.*')
                 ->where('tbl_products.product_id', $product_by_id ->product_id)
                ->get();

//        echo '<pre>';
//       print_r($productImageById);
//       exit();


?>

<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">Edit Product</h2>
    </div> 
    
    
<div class="col-lg-12"style="margin-top: 4%">
    <div class="well" >
       
<!--        <form action="" method="POST"id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
             {!! Form::open(['url'=>'/wp-admin/master/product/update',   'name'=>'editForm',    'method'=>'POST',   'enctype'=>'multipart/form-data' ,'class'=>'form-horizontal form-label-left']) !!}
           
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">Product Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$product_by_id->product_name}}" name="product_name" required class="form-control col-md-7 col-xs-12">
                    <input type="hidden" value="{{$product_by_id->product_id}}" name="number" required class="form-control col-md-7 col-xs-12">
                   
                </div>
            </div>
            
            
            
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Name</label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <select name="category_id" class="form-control">
                        <option value="0">Select Category Name</option>
                       @foreach($all_published_category_id as $category)
                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                 @endforeach
                    </select>
                </div>
            </div> 
             
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category Name</label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <select name="sub_category_id" class="form-control">
                        <option value="0">Select Sub Category Name</option>
                       @foreach($all_published_sub_category_id as $subCategory)
                        <option value="{{$subCategory->sub_category_id}}">{{$subCategory->sub_category_name}}</option>
                 @endforeach
                    </select>
                </div>
            </div>
             
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mini Category Name</label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <select name="mini_category_id" class="form-control">
                        <option value="0">Select Mini Category Name</option>
                       @foreach($all_published_mini_category_id as $miniCategory)
                        <option value="{{$miniCategory->mini_category_id}}">{{$miniCategory->mini_category_name}}</option>
                 @endforeach
                    </select>
                </div>
            </div>
            
            
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Manufacture Name</label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <select name="manufacture_id" class="form-control">
                        <option value="0">Select Manufacture Name</option>
                       @foreach($all_published_manufacture_id as $manufacture)
                        <option value="{{$manufacture->manufacture_id}}">{{$manufacture->manufacture_name}}</option>
                 @endforeach
                    </select>
                </div>
            </div> 
            
            
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-price">Product Price <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" value="{{$product_by_id->product_price}}" name="product_price" class="form-control col-md-7 col-xs-12">
                     
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Size</label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <select name="product_size" class="form-control" required="">
                        <option value="0">Select Product Size</option>
                        <option value="S">Small</option>
                        <option value="M">Medium</option>
                        <option value="L">Large</option>
                        <option value="XL">X-Large</option>
                    </select>
                </div>
            </div>  

             
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-quantity">Product Quantity <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" value="{{$product_by_id->product_quantity}}" name="product_quantity" class="form-control col-md-7 col-xs-12">
                   
                </div>
            </div>
            
            
            
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-short-description">Product Short Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class='form-control' name='product_short_description' row='15 '>
                        {{$product_by_id->product_short_description}}
                    </textarea>
                       
                </div>
            </div> 
             
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-long-description">Product Long Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea class='form-control' name='product_long_description' row='15'>
                        {{$product_by_id->product_long_description}}
                    </textarea>
                        
                </div>
            </div> 
 
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-image">Product Image<span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="file" name="productImage1" accept="image/*" /><br>
                     <input type="file"  name="productImage2" accept="image/*" /><br>
                     <input type="file"  name="productImage3" accept="image/*" /><br>
                 </div>
             </div>
             
             
               <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for=" "> <span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                      @foreach($productImageById as $image)
             
                      <img src="{{ asset($image->image_url)}}" width="50px">
                @endforeach
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
                    <input type="submit" name='btn' value="update Product" class="btn btn-success">
                </div>
            </div>
         {!! Form::close() !!}
    </div>
</div>
</div>    
      



<script>
document.forms['editForm'].elements['category_id'].value={{$product_by_id->category_id}};
        
document.forms['editForm'].elements['sub_category_id'].value={{$product_by_id->sub_category_id}};
    
document.forms['editForm'].elements['mini_category_id'].value={{$product_by_id->mini_category_id}};

document.forms['editForm'].elements['manufacture_id'].value={{$product_by_id->manufacture_id}};

document.forms['editForm'].elements['publicationStatus'].value={{$product_by_id->product_publicationStatus}};


document.forms['editForm'].elements['product_size'].value={{$product_by_id->product_size}};
</script>
@endsection