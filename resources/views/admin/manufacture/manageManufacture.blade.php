@extends('admin.master')
@section('mainContent')

<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">Manage Manufacture</h2>
    </div> 
    <div class="">
        <h4 class="tex text-center text-danger">{{Session::get('manufacture_message')}}</h4>
    </div> 
    
  

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">
           
                <tr class="headings">
                    <th class="column-title"># </th>
                    <th class="column-title">Manufacture Name </th>
                     <th class="column-title">Manufacture Description </th>
                    <th class="column-title">Publication Status </th>
                    <th class="column-title">Action</th>
                </tr>
                
         @foreach($all_manufactures as $manufacture)
                <tr class="even pointer">
                     <td class="center ">{{$manufacture ->manufacture_id}}</td>
                    <td class="center ">{{$manufacture ->manufacture_name}}</td>
                     <td class="center ">{{$manufacture ->manufacture_description}}</td>
                     <td class="center ">{{$manufacture ->manufacture_publicationStatus == 1?'Published':'UnPublished'}}</td>
                     <td>
                         <?php if ($manufacture->manufacture_publicationStatus == 1) { ?>
                        <a href="{{URL::to('/wp-admin/master/manufacture/unpublished/'.$manufacture ->manufacture_id)}}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-arrow-down">Un-Published</span> 

                        </a> 
<?php } else { ?>
                        <a href="{{URL::to('wp-admin/master/manufacture/published/'.$manufacture ->manufacture_id)}}" class="btn btn-info">
                            <span class="glyphicon glyphicon-arrow-up">Published  </span> 
                        </a>
<?php } ?>

                         
                         
                         
                         <a href="{{url('/wp-admin/master/manufacture/edit/'.$manufacture ->manufacture_id)}}" class="btn btn-success">
                             <span class="glyphicon glyphicon-edit"></span>
                         </a> 
                         
                         <a href="{{url('wp-admin/master/manufacture/delete/'.$manufacture ->manufacture_id)}}" class="btn btn-danger">
                             <span class="glyphicon glyphicon-trash"></span>
                         </a>
                         
                         
                     </td>  
                </tr>
                @endforeach
                                     
        </table>
    </div>
    
 
</div>    


             
@endsection