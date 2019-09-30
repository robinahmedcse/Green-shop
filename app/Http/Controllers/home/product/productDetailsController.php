<?php

namespace App\Http\Controllers\home\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class productDetailsController extends Controller
{
 

public function singleProductDetails($product_name, $product_id){
		
		//return $product_id;
     $single_product_id=$product_id;

     $published_product_by_id=DB::table('tbl_products')

            ->join('tbl_manufactures', 'tbl_products.manufacture_id', '=', 'tbl_manufactures.manufacture_id')       
            ->where('tbl_products.product_id', $single_product_id)
            ->where('tbl_products.product_publicationStatus', 1)
            ->select('tbl_products.*','tbl_products.product_short_description','tbl_manufactures.manufacture_name')
                ->first();

 

      // echo '<pre>';
      // print_r($published_product_by_id);
      // exit();




$publishedProducts=DB::table('tbl_products')
          		  ->join('tbl_product_images', 'tbl_products.product_id', '=', 'tbl_product_images.product_id')
          		  ->where('tbl_products.product_publicationStatus', 1)
          		  ->where('tbl_product_images.image_label', 1)
          		
          		  ->select('tbl_products.product_id','tbl_products.product_name','tbl_products.product_price', 'tbl_product_images.image_url')
          		  ->orderBy('product_id', 'desc')
          
          		  ->get();


      // echo '<pre>';
      // print_r($publishedProducts);
      // exit();


  




        $productDetails = view('frontEnd.product.productDetails')
                ->with('published_product_by_id',$published_product_by_id)
                ->with('publishedProducts',$publishedProducts);

        return view('frontEnd.master')
                ->with('mainContent', $productDetails);
               
         

    }


}//end of productDetailsController
