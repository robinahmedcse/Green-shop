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
                 <th class="column-title">Payment Status</th>
                <th class="column-title"> Status(pay) </th>
                <th class="column-title">Action</th>
            
            </tr>
                 @foreach($orders as $order)
                 <tr class="even pointer">
                     <td class="center ">{{$order ->order_id}}</td>
                     <td class="center ">{{$order ->customer_name}}</td>
                     <td class="center ">{{$order ->order_total}} BDT</td>
                     <td class="center ">{{$order ->order_status}}</td>
                     <td class="center ">{{$order ->payment_status}}</td>
                     
                      <td>
                          
                          <?php 
                                 $payment_type = $order ->payment_type;
                                 $payment_status=$order ->payment_status;
                          
                                   if(($payment_type == 'Bkash' || $payment_type == 'Rocket') && $payment_status == 'pending'){
                          ?>
                          
                          
                          <a href="{{url('/wp-admin/master/single/order/payment/status/change/'.$order ->payment_id)}}" class="btn btn-danger" onclick="return payment_status();">
                             <span class="glyphicon ">Complete</span>
                         </a> 
                             <?php 
                                 
                          
                                   }
                                   elseif (($payment_type == 'CashOnDelivery') && $payment_status == 'pending'){
                          ?>
                          
                             <a href="{{url('/wp-admin/master/single/order/payment/status/change/'.$order ->payment_id)}}" class="btn btn-danger" onclick="return payment_status();">
                             <span class="glyphicon ">COD</span>
                         </a> 
                           
                       <?php 
                                   }else{
                       ?>
                          
                           
<!--                             <span class="glyphicon ">Paid</span>-->
                         
                          
                           <?php 
                                   }
                       ?>
                         
                     </td> 
                     
                     
                     
                     
                     
                      <td>
                          <a href="{{url('/wp-admin/master/single/view/order/'.$order ->order_id)}}" target="_blank" class="btn btn-success">
                             <span class="glyphicon glyphicon-zoom-in"></span>
                         </a> 
  
                   
                          
                         <a class="btn btn-info" href="{{url('/wp-admin/master/single/order/invoice/pdf/'.$order ->order_id)}}" >
                                            <i class="glyphicon glyphicon-book"></i>  
                                    
                         </a>
                        
                          <a class="btn btn-warning" href="{{url('/wp-admin/master/single/view/order/invoice/generate/pdf/'.$order ->order_id)}}" >
                                            <i class="glyphicon glyphicon-download"></i>  
                                      
                          </a> 
                          
                              <a href="{{url('/wp-admin/master/all/order/status/change/'.$order ->order_id)}}" target="_blank" class="btn btn-success">
                             <span class="glyphicon glyphicon-copy"></span>
                         </a> 
                          
                         
                      
                          
<!--                           
                          <a class="btn btn-danger" href="?Status=delete&&id=" onclick="return one_delete();" >
                                            <i class="glyphicon glyphicon-trash"></i>  
                                         
                          </a>-->
                         
                         
                     </td> 
                 </tr>
                 
                   
                 
                @endforeach
        </table>
    </div>
    
 
</div>    


             
@endsection