<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\Http\Controllers\home\cart;
use Illuminate\Support\Facades\Crypt;


class welcomeController extends Controller
{
  
    
    
    public function home() {
           
  

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
                
                
                
                $publishedManProducts=DB::table('tbl_products')
          		  ->join('tbl_product_images', 'tbl_products.product_id', '=', 'tbl_product_images.product_id')
          		  ->where('tbl_products.product_publicationStatus', 1)
                            ->where('tbl_products.category_id', 1)  
                             ->where('tbl_product_images.image_label', 1)
                          
          		  ->select('tbl_products.product_id','tbl_products.product_name','tbl_products.product_price', 'tbl_product_images.image_url')
          		  ->orderBy('product_id', 'desc')
          
          		  ->get();

                
//     echo '<pre>';
//       print_r($publishedManProducts);
//       exit();
       
       
                    
                $publishedWomenProducts=DB::table('tbl_products')
          		  ->join('tbl_product_images', 'tbl_products.product_id', '=', 'tbl_product_images.product_id')
          		  ->where('tbl_products.product_publicationStatus', 1)
                            ->where('tbl_products.category_id', 2)  
                             ->where('tbl_product_images.image_label', 1)
                          
          		  ->select('tbl_products.product_id','tbl_products.product_name','tbl_products.product_price', 'tbl_product_images.image_url')
          		  ->orderBy('product_id', 'desc')
          
          		  ->get();

//                
//     echo '<pre>';
//       print_r($publishedWomenProducts);
//       exit();
//       
       $publishedBaner=DB::table('tbl_banners')
          		  ->where('banner_publication_status', 1)
          		  ->get();
//        echo '<pre>';
//       print_r($publishedBaner);
//       exit();    
//       
       

        $homeContent = view('frontEnd.home.home') 
                 ->with('publishedManProducts',$publishedManProducts)
                 ->with('publishedProducts',$publishedProducts)
                 ->with('publishedWomenProducts',$publishedWomenProducts)
                ->with('publishedBaner',$publishedBaner);
         
        
        return view('frontEnd.master')
                ->with('mainContent', $homeContent);
               
         
       // return view('frontEnd.master');
    }



    
    public function myContact() {
          $contactContent = view('frontEnd.contact.contact');
        return view('frontEnd.master')
                ->with('mainContent', $contactContent);
               
    }



    
    
    
}
