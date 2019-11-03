<?php

namespace App\Http\Controllers\home\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;

class productMainCategoryController extends Controller
{
   
    
    public function mainCategoryDetails($name,$url) {
                
     $main_category_name=$name;
 
    
      $get_id= DB::table('tbl_categories')
            ->where('category_url',$url)
            ->select('category_id')
            ->first();
    
   
 $main_category_id=$get_id->category_id;
 
 
     $published_main_category_product=DB::table('tbl_products')
            ->join('tbl_product_images', 'tbl_products.product_id', '=', 'tbl_product_images.product_id')
            ->join('tbl_categories', 'tbl_products.category_id', '=', 'tbl_categories.category_id')       
            ->where('tbl_products.category_id', $main_category_id)
            ->where('tbl_products.product_publicationStatus', 1)
            ->where('tbl_product_images.image_label', 1)
            ->select('tbl_products.product_id', 'tbl_products.product_name','tbl_products.product_price',
                    'tbl_products.product_short_description','tbl_product_images.*'
                    ,'tbl_categories.category_name')
            ->orderBy('tbl_products.product_id', 'desc')
                //  ->take(10)
              //  ->get();
                ->paginate(15);

 
     
     
//echo $main_category_name;
//       echo '<pre>';
//       print_r($published_main_category_product);
//       exit();
       
       

 
       
       
       
       

      $miniPublishedCategory=DB::table('tbl_mini_categories')
                ->where('mini_category_publicationStatus', 1)
              ->select('tbl_mini_categories.mini_category_id', 'tbl_mini_categories.mini_category_name')
              ->get();
       
//            echo '<pre>';
//       print_r($miniPublishedCategory);
//       exit();
      
 
      
      

        $mainCategoryContent = view('frontEnd.category.mainCategoryContent')
                ->with('published_main_category_product',$published_main_category_product)
                  ->with('miniPublishedCategory',$miniPublishedCategory)
                ->with('main_category_name',$main_category_name);

        return view('frontEnd.master')
                ->with('mainContent', $mainCategoryContent);
               
         
       // return view('frontEnd.master');
    }
    
    
    
    
    
    
    
    
}// end productMainCategoryController
