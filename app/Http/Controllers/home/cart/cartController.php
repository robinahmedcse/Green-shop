<?php

namespace App\Http\Controllers\home\cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class cartController extends Controller {

    public function addCart($product_id, Request $request) {
       // return 'ad to acrd';

     if($request->qty == NULL){
         $product_qty =1;
         $get_product_id = $product_id;
                //        echo $product_qty.'get' ;
                //         echo $get_product_id.'get' ;
                // exit();
     }
     else
          {
              $product_qty = $request->qty;
              $get_product_id = $request->product_id;
                    // echo $product_qty.'post';
                    // echo $get_product_id.'post' ;
                    //       exit();
         }  
      

        $product_info = DB::table('tbl_products')
                ->join('tbl_product_images', 'tbl_products.product_id', '=', 'tbl_product_images.product_id')
                ->where('tbl_products.product_id', $get_product_id)
                ->where('tbl_product_images.image_label', 1)
                ->select('tbl_products.*', 'tbl_product_images.*')
                ->first();


        // echo "<pre>";
        // print_r($product_info);
        // exit();


        Cart::add(array(
            'id' => $product_info->product_id,
            'name' => $product_info->product_name,
            'price' => $product_info->product_price,
            'quantity' => $product_qty,
            'attributes' => array(
                'image' => $product_info->image_url
            )
        ));


        return redirect::to('/show/cart');
    

    }// end of addCart

    public function showCart() {

       
        $createCart = view('frontEnd.cart.cart');
        return view('frontEnd.master')->with('mainContent', $createCart);
    }

// end of show cart

   // public function updateCart(request $request) {
 public function updateCart($qty, $id) {
          //return $request->all();
          return $qty.$id;
          
        $pro_id = $request->product_id;
        $pro_qty = $request->product_quantity;

        Cart::update($pro_id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $pro_qty
            ),
        ));

        return redirect::to('/show/cart');
    }

// end of update Cart

    public function deleteCart($product_id) {

        //return $product_id;
        Cart::remove($product_id);

        return redirect::to('/show/cart');
    }

// end of delete   Cart
}

// end of class of   Cart





