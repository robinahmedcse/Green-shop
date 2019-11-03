@extends('admin.master')
@section('mainContent')

<div class='row '>
    <div class="">
        <h2 class="tex text-center text-success">view Order</h2>

    </div> 

    <div class="">
        <h4 class="tex text-center text-danger">{{Session::get('message')}}</h4>
    </div> 



    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">

            <tr>
                <th colspan="2"><h3 class="text-center text-success">{{$customer_info_by_id->customer_name}} Information</h3></th>

            </tr>
            <tr>
                <th>Customer Name</th>
                <td>{{$customer_info_by_id->customer_name}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td> {{$customer_info_by_id->email}}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{$customer_info_by_id->phone}} </td>
            </tr>

            <tr>
                <th>Address</th>
                <td>{{$customer_info_by_id->address}} </td>
            </tr>
            <tr>
                <th>City</th>
                <td> {{$customer_info_by_id->city}}</td>
            </tr>
            <tr>
                <th>Thana</th>
                <td> {{$customer_info_by_id->thana}}</td>
            </tr>
            <tr>
                <th>P.O</th>
                <td> {{$customer_info_by_id->post_office}}</td>
            </tr>
            <tr>
                <th>District</th>
                <td> {{$customer_info_by_id->district}}</td>
            </tr>
            <tr>
                <th>Country</th>
                <td>{{$customer_info_by_id->country}} </td>
            </tr>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">

            <tr>
                <th colspan="2"><h3 class="text-center text-success">Product Shipping Information</h3></th>

            </tr>
            <tr>
                <th>Customer Name</th>
                <td>{{$shipping_info_by_id->customer_name}}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{$shipping_info_by_id->phone}} </td>
            </tr>

            <tr>
                <th>Address</th>
                <td>{{$shipping_info_by_id->address}} </td>
            </tr>
            <tr>
                <th>City</th>
                <td> {{$shipping_info_by_id->city}}</td>
            </tr>
            <tr>
                <th>Thana</th>
                <td> {{$shipping_info_by_id->thana}}</td>
            </tr>
            <tr>
                <th>P.O</th>
                <td> {{$shipping_info_by_id->post_office}}</td>
            </tr>
            <tr>
                <th>District</th>
                <td> {{$shipping_info_by_id->district}}</td>
            </tr>
            <tr>
                <th>Country</th>
                <td>{{$shipping_info_by_id->country}} </td>
            </tr>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">

            <tr>
                <th colspan="2"><h3 class="text-center text-success">Payment Information</h3></th>

            </tr>
            <tr>
                <th>Payment Type</th>
                <td>{{$customer_info_by_id->payment_type}} </td>
            </tr>

            <tr>
                <th>Payment Status</th>
                <td>{{$customer_info_by_id->payment_status}} </td>
            </tr>

        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">
            <tr>
                <th colspan="4"><h3 class="text-center text-success">Product Information</h3></th>

            </tr>
            <tr class="headings">
                <th class="column-title"># </th>
                <th class="column-title">Name </th>
                <th class="column-title">Quantity </th>
                <th class="column-title">Price </th>


            </tr>

            <?php
            $sum = 0;
            $p= 0;
            ?>
            @foreach($order_details_by_id as $product)
            <tr class="even pointer">
                <td class="center ">{{$product ->product_id}}</td>
                <td class="center ">{{$product ->product_name}}</td>
                <td class="center ">{{$product ->product_quantity}} piece</td>
                <td class="center ">{{$product ->product_price}} BDT</td>


                <?php
                $qty = $product->product_quantity;
                $sum = $qty + $sum;
                
                
                $price=$product ->product_price;
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