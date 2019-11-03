@extends('admin.master')
@section('mainContent')

<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success"> Manage Women Product Page Banner</h2>
    </div> 
    <div class="">
        <h4 class="tex text-center text-danger">{{Session::get('woman_message')}}</h4>
    </div> 
    
  

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">
           
            <tr class="headings">
                <th class="column-title"># </th>
                <th class="column-title">Name </th>
                <th class="column-title">Photo </th>
                <th class="column-title">Publication Status </th>
                <th class="column-title">Action</th>
            </tr>
                
         @foreach($all_banners as $banner)
                <tr class="even pointer">
                     <td class="center ">{{$banner ->woman_pro_id}}</td>
                    <td class="center ">{{$banner ->woman_pro_name}}</td>
                     <td class="center "> 
                      <img src="{{asset($banner ->woman_pro_image_url)}}" alt="Banner images" width="100px">
                     </td>
                     <td class="center ">{{$banner ->publication_status == 1?'Published':'UnPublished'}}</td>
                     <td>
                         <?php if ($banner->publication_status == 1) { ?>
                        <a href="{{URL::to('/wp-admin/master/banner/woman/unpublished/'.$banner ->woman_pro_id)}}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-arrow-down">Un-Published</span> 

                        </a> 
<?php } else { ?>
                        <a href="{{URL::to('wp-admin/master/banner/woman/published/'.$banner ->woman_pro_id)}}" class="btn btn-info">
                            <span class="glyphicon glyphicon-arrow-up">Published  </span> 
                        </a>
<?php } ?>

                         
                         
                         
                         <a href="{{url('/wp-admin/master/banner/woman/edit/'.$banner ->woman_pro_id)}}" class="btn btn-success">
                             <span class="glyphicon glyphicon-edit"></span>
                         </a> 
                         
                         <a href="{{url('wp-admin/master/banner/woman/delete/'.$banner ->woman_pro_id)}}" class="btn btn-danger"  onclick="return one_delete();">
                             <span class="glyphicon glyphicon-trash"></span>
                         </a>
                         
                         
                     </td>  
                </tr>
                @endforeach
                                     
        </table>
    </div>
    
 
</div>    


             
@endsection