@extends('admin.master')

@section('title')
Manage Sub Category | Admin Panel
@endsection

@section('mainContent')
<?php
//   echo '<pre>';
//   print_r($categories);
//   exit();
?>

<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">Manage Sub Category</h2>
    </div> 
    <div class="">
        <h4 class="tex text-center text-danger">{{Session::get('sub_category_message')}}</h4>
    </div> 



    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">

            <tr class="headings">
                <th class="column-title"># </th>
                <th class="column-title">Main Category</th>
                <th class="column-title">Sub Category Name </th>
                <th class="column-title">Sub Category Description </th>
                <th class="column-title">Publication Status </th>
                <th class="column-title">Action</th>
            </tr>
            @foreach($all_sub_categories as $category)
            <tr class="even pointer">
                <td class="center ">{{$category ->sub_category_id}}</td>
                <td class="center ">{{$category ->category_name}}</td>
                <td class="center ">{{$category ->sub_category_name}}</td>
                <td class="center ">{{$category ->sub_category_description}}</td>
                <td class="center ">{{$category ->sub_category_publicationStatus == 1?'Published':'UnPublished'}}</td>
                <td>
<?php if ($category->sub_category_publicationStatus == 1) { ?>
                        <a href="{{URL::to('/wp-admin/master/category/sub/unpublished/'.$category ->sub_category_id)}}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-arrow-down">Un-Published</span> 

                        </a> 
<?php } else { ?>
                        <a href="{{URL::to('/wp-admin/master/category/sub/published/'.$category ->sub_category_id)}}" class="btn btn-info">
                            <span class="glyphicon glyphicon-arrow-up">Published  </span> 
                        </a>
<?php } ?>


                    <a href="{{URL::to('wp-admin/master/category/sub/edit/'.$category ->sub_category_id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a> 

                    <a href="{{URL::to('/wp-admin/master/category/sub/delete/'.$category ->sub_category_id)}}" class="btn btn-danger" onclick="return one_delete();">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>


                </td>  
                @endforeach
            </tr>

        </table>
    </div>


</div>    



@endsection