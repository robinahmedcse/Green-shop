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
        <h2 class="tex text-center text-success">Manage Mini Category</h2>
    </div> 
    <div class="">
        <h4 class="tex text-center text-danger">{{Session::get('mini_category_message')}}</h4>
    </div> 



    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">

            <tr class="headings">
                <th class="column-title"># </th>
                <th class="column-title">Sub Category Name </th>
                <th class="column-title">Mini Category Name </th>
                <th class="column-title">Category Description </th>
                <th class="column-title">Publication Status </th>
                <th class="column-title">Action</th>
            </tr>
            @foreach($all_mini_categories as $category)
            <tr class="even pointer">
                <td class="center ">{{$category ->mini_category_id}}</td>
                   <td class="center ">{{$category ->sub_category_name}}</td>
                <td class="center ">{{$category ->mini_category_name}}</td>
                <td class="center ">{{$category ->mini_category_description}}</td>
                <td class="center ">{{$category ->mini_category_publicationStatus == 1?'Published':'UnPublished'}}</td>
                <td>
<?php if ($category->mini_category_publicationStatus == 1) { ?>
                        <a href="{{URL::to('/wp-admin/master/category/mini/unpublished/'.$category ->mini_category_id)}}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-arrow-down">Un-Published</span> 

                        </a> 
<?php } else { ?>
                        <a href="{{URL::to('/wp-admin/master/category/mini/published/'.$category ->mini_category_id)}}" class="btn btn-info">
                            <span class="glyphicon glyphicon-arrow-up">Published  </span> 
                        </a>
<?php } ?>


                    <a href="{{URL::to('admin/edit-sub-category/'.$category ->mini_category_id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a> 

                    <a href="{{URL::to('admin/delete-sub-category/'.$category ->mini_category_id)}}" class="btn btn-danger" onclick="return one_delete();">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>


                </td>  
                @endforeach
            </tr>

        </table>
    </div>


</div>    



@endsection