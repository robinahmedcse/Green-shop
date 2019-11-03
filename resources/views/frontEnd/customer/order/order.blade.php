
@extends('frontEnd.customer.userMaster')

@section('title')
New-shop | Customer Panel
@endsection


@section('mainContent')
   
<?php 
  
//   echo '<pre>';
//   print_r($customer_info);
//   exit();
 
?>
 
<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">{{Session::get('user_customer_name')}} Profile</h2>
    </div> 
     
    
  

    <div class="table-responsive">
         <table class="table table-bordered table-hover table-condensed">
           
            <tr class="headings">
                <th class="column-title"># </th>
                <th class="column-title">Customer Name  </th>
                <th class="column-title">Order Total (without Shipping charge) </th>
                <th class="column-title">Order Status </th>
               
                <th class="column-title">Action </th>
            
            </tr>
                 @foreach($orders as $order)
                 <tr class="even pointer">
                     <td class="center ">{{$order ->order_id}}</td>
                     <td class="center ">{{$order ->customer_name}}</td>
                     <td class="center ">{{$order ->order_total}} BDT</td>
                     <td class="center ">{{$order ->order_status}}</td>
                     
                      <td>
                         <a href="{{url('customer/total/order/view/'.$order ->order_id)}}" class="btn btn-success">
                             <span class="glyphicon glyphicon-zoom-in"></span>
                         </a> 
                         
 
                         
                     </td> 
                 </tr>
                 
                   
                 
                @endforeach
        </table>
    </div>
    
 
</div>    

@endsection