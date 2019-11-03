@extends('admin.master')
@section('mainContent')

<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">Manage Banner</h2>
    </div> 
    <div class="">
        <h4 class="tex text-center text-danger">{{Session::get('ban_message')}}</h4>
    </div> 
    
  

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">
           
            <tr class="headings">
                <th class="column-title"># </th>
                <th class="column-title">Description </th>
                <th class="column-title">Photo </th>
                <th class="column-title">Publication Status </th>
                <th class="column-title">Action</th>
            </tr>
                
         @foreach($all_banners as $banner)
                <tr class="even pointer">
                     <td class="center ">{{$banner ->banner_id}}</td>
                    <td class="center ">{{$banner ->banner_description}}</td>
                     <td class="center "> 
                      <img src="{{asset($banner ->banner_image_url)}}" alt="Banner images" width="100px">
                     </td>
                     <td class="center ">{{$banner ->banner_publication_status == 1?'Published':'UnPublished'}}</td>
                     <td>
                         <?php if ($banner->banner_publication_status == 1) { ?>
                        <a href="{{URL::to('/wp-admin/master/banner/unpublished/'.$banner ->banner_id)}}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-arrow-down">Un-Published</span> 

                        </a> 
<?php } else { ?>
                        <a href="{{URL::to('wp-admin/master/banner/published/'.$banner ->banner_id)}}" class="btn btn-info">
                            <span class="glyphicon glyphicon-arrow-up">Published  </span> 
                        </a>
<?php } ?>

                         
                         
                         
                         <a href="{{url('/wp-admin/master/banner/edit/'.$banner ->banner_id)}}" class="btn btn-success">
                             <span class="glyphicon glyphicon-edit"></span>
                         </a> 
                         
                         <a href="{{url('wp-admin/master/banner/delete/'.$banner ->banner_id)}}" class="btn btn-danger"  onclick="return one_delete();">
                             <span class="glyphicon glyphicon-trash"></span>
                         </a>
                         
                         
                     </td>  
                </tr>
                @endforeach
                                     
        </table>
    </div>
    
 
</div>    


             
@endsection