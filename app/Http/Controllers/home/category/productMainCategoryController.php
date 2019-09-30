<?php

namespace App\Http\Controllers\home\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;

class productMainCategoryController extends Controller
{
   
    
    public function mainCategoryDetails($name,$id) {
                
     $main_category_name=$name.
     $main_category_id=$id;

     $published_main_category_product=DB::table('tbl_products')
            ->join('tbl_product_images', 'tbl_products.product_id', '=', 'tbl_product_images.product_id')
            ->join('tbl_categories', 'tbl_products.category_id', '=', 'tbl_categories.category_id')       
            ->where('tbl_products.category_id', $main_category_id)
            ->where('tbl_products.product_publicationStatus', 1)
            ->where('tbl_product_images.image_label', 1)
            ->select('tbl_products.product_id', 'tbl_products.product_name','tbl_products.product_price',
                    'tbl_products.product_short_description','tbl_product_images.*')
            ->orderBy('tbl_products.product_id', 'desc')
                //  ->take(10)
                ->get();

 

//       echo '<pre>';
//       print_r($published_main_category_product);
//       exit();


        $mainCategoryContent = view('frontEnd.category.mainCategoryContent')
                ->with('published_main_category_product',$published_main_category_product);

        return view('frontEnd.master')
                ->with('mainContent', $mainCategoryContent);
               
         
       // return view('frontEnd.master');
    }
    
    
    
    
    
    
    
    
}// end productMainCategoryController
