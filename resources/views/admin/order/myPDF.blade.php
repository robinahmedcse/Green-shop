 



<!DOCTYPE html>
<html>
    <head>
        <title>Invoice</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontEnd/')}}/{{asset('public/frontEnd/')}}/images/favicon.ico">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
    </head>
    
    
    
    <body>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">Invoice
                        <strong>{{ date('d-m-Y H:i:s')}}</strong> 
                        <span class="float-right"> <strong>Status:</strong> {{$customer_info_by_id->payment_status}}</span>

                    </div>
                </div>
                <br>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">From:</h6>
                            <div>
                                <strong> Green Soft</strong>
                            </div>
                            <div>  Vivekanonda School & College Market (1st floor)</div>
                            <div>Zilla Sadar Road (Bot Tola) Tangail-1900</div>
                            <div>Email: greensoftbd24@gmail.com</div>
                            <div>Phone: 01718075532,01643223456</div>
                        </div>

                        <div class="col-sm-6">
                            <h6 class="mb-3">Bill To:</h6>
                            <div>
                                <strong>{{$customer_info_by_id->customer_name}}</strong>
                            </div>
                            <div>Address:{{$customer_info_by_id->address}},City:{{$customer_info_by_id->city}}</div>
                            <div>Thana:{{$customer_info_by_id->thana}},P.O:{{$customer_info_by_id->post_office}}</</div>
                            <div>District: {{$customer_info_by_id->district}}</div>
                            <div>Phone:{{$customer_info_by_id->phone}}</div>
                        </div>
                    </div>



                    <br>  <br>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Item</th>
                                    <th class="center">Qty</th>
                                    <th class="right">Unit Cost</th>

                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sum = 0;
                                $p = 0;
                                ?>
                                @foreach($order_details_by_id as $product)

                                <tr>
                                    <td class="center">1</td>
                                    <td class="left strong">{{$product ->product_name}}</td>
                                    <td class="left">{{$product ->product_quantity}} piece</td>

                                    <td class="right">{{$product ->product_price}} BDT</td>

                                    <td class="right"><?php
                                        echo $product->product_quantity * $product->product_price;
                                        ?>BDT</td>
                                    <?php
                                    $qty = $product->product_quantity;
                                    $sum = $qty + $sum;


                                    $price = $product->product_price;
                                    $p = $price + $p;
                                    ?>

                                </tr>


                                @endforeach  

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">

                        </div>

                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="right"><?php echo $p ?> BDT</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Shipping Charges (100BDT)</strong>
                                        </td>
                                        <td class="right"><?php echo $ship = $sum * 100; ?>BDT</td>
                                    </tr>

                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong>
                                                <?php
                                                $total = $ship + $p;
                                                echo $total;
                                                ?>
                                                BDT
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
