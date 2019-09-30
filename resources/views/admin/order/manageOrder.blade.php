@extends('admin.master')
@section('mainContent')
 
<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">Manage Order</h2>
    </div> 
    <div class="">
        <h4 class="tex text-center text-danger">{{Session::get('message')}}</h4>
    </div> 
    
  
 
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">
           
            <tr class="headings">
                <th class="column-title"># </th>
                <th class="column-title">Name</th>
                <th class="column-title">Order Total</th>
                <th class="column-title">Order Status</th>
               
                <th class="column-title">Action</th>
            
            </tr>
                 @foreach($orders as $order)
                 <tr class="even pointer">
                     <td class="center ">{{$order ->order_id}}</td>
                     <td class="center ">{{$order ->customer_name}}</td>
                     <td class="center ">{{$order ->order_total}} BDT</td>
                     <td class="center ">{{$order ->order_status}}</td>
                     
                      <td>
                         <a href="{{url('/wp-admin/master/single/view/order/'.$order ->order_id)}}" class="btn btn-success">
                             <span class="glyphicon glyphicon-zoom-in"></span>
                         </a> 
  
                         <a class="btn btn-info" href="edit-order.php?&&id=" >
                                            <i class="halflings-icon white arrow-down"></i>  
                                       Edit 
                         </a> 
                          
                         <a class="btn btn-success" href="{{url('/wp-admin/master/single/order/invoice/pdf/'.$order ->order_id)}}" >
                                            <i class="halflings-icon white arrow-down"></i>  
                                     View invoice 
                         </a>
                        
                          <a class="btn btn-warning" href="{{url('/wp-admin/master/single/view/order/invoice/generate/pdf/'.$order ->order_id)}}" >
                                            <i class="halflings-icon white arrow-down"></i>  
                                      Download invoice
                          </a> 
                          
                          
                           
                          <a class="btn btn-danger" href="?Status=delete&&id=" onclick="return one_delete();" >
                                            <i class="halflings-icon white arrow-down"></i>  
                                       Delete 
                          </a>
                         
                         
                     </td> 
                 </tr>
                 
                   
                 
                @endforeach
        </table>
    </div>
    
 
</div>    


             
@endsection