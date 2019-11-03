@extends('admin.master')
@section('mainContent')
 
<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">Manage Product</h2>
    </div> 
    <div class="">
        <h4 class="tex text-center text-danger">{{Session::get('product_message')}}</h4>
    </div> 
 
        
    <div class="">
        <h4 class="tex text-center text-danger"> Total {{ $all_product_info->count()}} Product Present</h4>
    </div> 

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">
           
            <tr class="headings">
                <th class="column-title"># </th>
                <th class="column-title">Pro_Name </th>
              <th class="column-title">Cat_Name </th>
                <th class="column-title">Ma_Name </th>
                <th class="column-title">Pro_Price </th>
                <th class="column-title">Pro_Quantity </th>
                <th class="column-title">Status </th>
                <th class="column-title">Action</th>
            </tr>
                 @foreach($all_product_info as $product)
                 <tr class="even pointer">
                     <td class="center ">{{$product ->product_id}}</td>
                     <td class="center ">{{$product ->product_name}}</td>
                     <td class="center ">{{$product ->category_name}}</td>
                      <td class="center ">{{$product ->manufacture_name}}</td>
                     <td class="center ">{{$product ->product_price}}</td>
                     <td class="center ">{{$product ->product_quantity}}</td>
                   
                     <td class="center ">{{$product ->product_publicationStatus == 1?'Published':'UnPublished'}}</td>
                     <td>

                           <?php if ($product ->product_publicationStatus  == 1) { ?>
                                            <a href="{{URL::to('/wp-admin/master/product/unpublished/'.$product ->product_id)}}" class="btn btn-warning">
                                                <span class="glyphicon glyphicon-arrow-down">Un-Published</span> 
                                            
                                            </a> 
                                        <?php } else { ?>
                                            <a href="{{URL::to('/wp-admin/master/product/published/'.$product ->product_id)}}" class="btn btn-success">
                                                <span class="glyphicon glyphicon-arrow-up">Published  </span> 
                                            </a>
                                        <?php } ?>
                         
                  
                          <a href="{{url('/wp-admin/master/product/view/'.$product ->product_id)}}" class="btn btn-info">
                             <span class="glyphicon glyphicon-zoom-in"></span>
                         </a> 
                         
                         <a href="{{url('/wp-admin/master/product/edit/'.$product ->product_id)}}" class="btn btn-success">
                             <span class="glyphicon glyphicon-edit"></span>
                         </a> 

                         <a href="{{url('/wp-admin/master/product/delete/'.$product ->product_id)}}" class="btn btn-danger" onclick="return one_delete();">
                             <span class="glyphicon glyphicon-trash"></span>
                         </a>


                     </td>  
                 </tr>
                                        @endforeach
        </table>
        
        {{ $all_product_info->links() }}
  
    </div>
    
 
</div>    


             
@endsection