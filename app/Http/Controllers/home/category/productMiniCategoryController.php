<?php

namespace App\Http\Controllers\home\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class productMiniCategoryController extends Controller
{
      public function miniCategoryDetails($name,$url) {
                
     //$mini_category_name=$name;
      $get_id= DB::table('tbl_mini_categories')
            ->where('mini_category_url',$url)
            ->select('mini_category_id')
            ->first();
    
   
 $mini_category_id=$get_id->mini_category_id;
     
     
 // echo $mini_category_name;
   //  echo $mini_category_id;
    // exit();

     $published_mini_category_product=DB::table('tbl_products')
            ->join('tbl_product_images', 'tbl_products.product_id', '=', 'tbl_product_images.product_id')
            ->join('tbl_mini_categories', 'tbl_products.mini_category_id', '=', 'tbl_mini_categories.mini_category_id')       
            ->where('tbl_products.mini_category_id', $mini_category_id)
            ->where('tbl_products.product_publicationStatus', 1)
            ->where('tbl_product_images.image_label', 1)
            ->select('tbl_products.product_id', 'tbl_products.product_name','tbl_products.product_price',
                    'tbl_products.product_short_description','tbl_product_images.*')
            ->orderBy('tbl_products.product_id', 'desc')
                //  ->take(10)
              ->paginate(15);

 

     //  echo '<pre>';
     //  print_r($published_mini_category_product);
//       exit();
     
     
           $miniPublishedCategory=DB::table('tbl_mini_categories')
                ->where('mini_category_publicationStatus', 1)
              ->select('tbl_mini_categories.mini_category_id', 'tbl_mini_categories.mini_category_name')
              ->get();
           
           
           
     $main_category_name=$this->category_name($mini_category_id);

 $a=$published_mini_category_product -> isEmpty();
 //echo $a; // its retutn 1 if no data 
// exit();
       if( $a == '1'){
      
               return redirect::to('/');
       }
       else{
          
         $miniCategoryContent = view('frontEnd.category.miniCategoryContent')
                ->with('published_mini_category_product',$published_mini_category_product)
                  ->with('miniPublishedCategory',$miniPublishedCategory)
                 ->with('main_category_name',$main_category_name);
 
        return view('frontEnd.master')
                ->with('mainContent', $miniCategoryContent);
          
       }
       
         
         
       // return view('frontEnd.master');
    }
    
    
    protected function category_name($mini_category_id) {
               
        
          $get_sub_category=DB::table('tbl_mini_categories')
                   ->where('mini_category_id', $mini_category_id)
                   ->first();
           
       
      $sub_category_id=$get_sub_category->sub_category_id;
       
        
           $get_category=DB::table('tbl_sub_categories')
                   ->where('sub_category_id', $sub_category_id)
                   ->first();
   
             
           
        $category_id=$get_category->category_id;
           
         
             
               $category_name_find=DB::table('tbl_categories')
                   ->where('category_id', $category_id)
                    ->select('category_name')   
                    ->first();
             
               
              
           
       $category_name=$category_name_find->category_name;
       return $category_name;
      // exit();
           
           
    }
    
    
}
