<?php

namespace App\Http\Controllers\home\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class productMiniCategoryController extends Controller
{
      public function miniCategoryDetails($name,$id) {
                
     $mini_category_name=$name;
     $mini_category_id=$id;
     
//   echo $mini_category_id;
//     exit();

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
            ->get();

 

     //  echo '<pre>';
     //  print_r($published_mini_category_product);
//       exit();

 $a=$published_mini_category_product -> isEmpty();
 //echo $a; // its retutn 1 if no data 
// exit();
       if( $a == '1'){
      
               return redirect::to('/');
       }
       else{
          
         $miniCategoryContent = view('frontEnd.category.miniCategoryContent')
                ->with('published_mini_category_product',$published_mini_category_product);
 
        return view('frontEnd.master')
                ->with('mainContent', $miniCategoryContent);
          
       }
       
         
         
       // return view('frontEnd.master');
    }
    
    
    
    
    
}
