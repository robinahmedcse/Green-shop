
@extends('frontEnd.customer.userMaster')

@section('title')
Green shop |My profile |Customer Panel
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
                
                    <th class="column-title">Name </th>
                    <th class="column-title">email </th>
                    <th class="column-title">phone</th>
                    <th class="column-title">Village</th>
                    <th class="column-title">City</th>
                      <th class="column-title">Thana</th>
                         <th class="column-title">P.O</th>
                    <th class="column-title">District</th>
                    <th class="column-title">Action</th>
                </tr>
          
                <tr class="even pointer">
                    
                    <td class="center ">{{$customer ->customer_name}}</td>
                     <td class="center ">{{$customer ->email}}</td>
                     <td class="center ">{{$customer ->phone}}</td>
                      <td class="center ">{{$customer->address}}</td>
                             <td class="center ">{{$customer->city}}</td>
                                    <td class="center ">{{$customer->thana}}</td>
                                    <td class="center ">{{$customer->post_office}}</td>
                                     <td class="center ">{{$customer->district}}</td>
                     <td>
                         <a href="{{url('customer/profile/edit/'.$customer ->customer_id)}}" class="btn btn-success">
                             <span class="glyphicon glyphicon-edit"></span>
                         </a> 
                         
                       
                         
                         
                     </td>  
                   
                </tr>
                                       
        </table>
    </div>
    
 
</div>    

@endsection