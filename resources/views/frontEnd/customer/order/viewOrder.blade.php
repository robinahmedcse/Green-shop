
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
                
<!--                    <th class="column-title">customer_name </th>-->
                                        <th class="column-title">image </th> 
                     <th class="column-title">Product name</th>
                       <th class="column-title">Product price</th>
                       <th class="column-title">Product quantity</th>
                    <th class="column-title">Price</th>
                 
                      <th class="column-title">Payment Type</th>
                         <th class="column-title">Payment Status</th>
                     <th class="column-title">Order Status</th>
                  
                </tr>
                  <?php
            $sum = 0;
            $p= 0;
            ?>
              @foreach($orders as $order)
                <tr class="even pointer">
                    
                    <?php 
                    
                       $product_id=$order->product_id;
                       
                  $product_image_info = DB::table('tbl_products')
                ->join('tbl_product_images', 'tbl_products.product_id', '=', 'tbl_product_images.product_id')
                ->where('tbl_products.product_id', $product_id)
                ->where('tbl_product_images.image_label', 1)
                ->select( 'tbl_product_images.*')
                ->first();

                  
//             echo '<pre>';
//             print_r($product_image_info);    
//            exit();
//                  
                  
                    ?>
                    
                    
<!--             <td class="center ">{{$order ->customer_name }}</td>-->
                   <td class="center "> 
                       <img src="{{URL::to($product_image_info ->image_url)}}" 
                            alt="product img" width="40%" height="20%"/></a>
                   </td>
                 <td class="center ">{{$order ->product_name }}</td>
                   <td class="center ">{{$order ->product_price }}</td>
                     <td class="center ">{{$order ->product_quantity }} piece</td>
                   <td class="center ">{{$order->order_total}} BDT</td>
            
                 <td class="center ">{{$order->payment_type}}</td>
               <td class="center ">{{$order->payment_status}}</td>
              <td class="center ">{{$order->order_status}}</td>
                  <?php
                $qty = $order->product_quantity;
                $sum = $qty + $sum;
                
                
                $price=$order ->product_price;
                $p=$price+$p;
                ?>

                   
                </tr>
                @endforeach                        
        </table>
        
         <table class="table table-bordered table-hover table-condensed">


            <tr class="headings">
                <th class="column-title">Total Quantity</th>
                <th class="column-title">Shipping charge </th>
                <th class="column-title">Total Shipping charge </th>
                <th class="column-title">Product Price </th>
                <th class="column-title">Total Price </th>


            </tr>


            <tr>
                
                <td>  <?php
                    echo $sum;
                    ?>
                    piece
                </td>
                
                <td>  
                    100 Tk
                </td>
                
                <td>  
                   <?php 
                   $s=100;
                   $t_s=$s*$sum;
                   echo $t_s;
                   ?>
                    BDT
                </td>
                  <td>  <?php
                    echo $p;
                    ?>
                    BDT
                </td>
                   <td>  <?php
                    echo $p+$t_s;
                    ?>
                    BDT
                </td>
            </tr>
        </table>
        
        
    </div>
    
 
</div>    

@endsection