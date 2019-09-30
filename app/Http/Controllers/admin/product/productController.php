<?php

namespace App\Http\Controllers\admin\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



class productController extends Controller
{
     
    public function admin_login_auth_check() {

        session_start();
        $admin_id = session::get('admin_id');
        $admin_role = session::get('admin_role');

        if ($admin_id == NUll && $admin_role == NUll) {
            redirect::to('/wp/admin/master/login/form/showing')->send();
        }
    }

    
    public function createProduct() {

        $this->admin_login_auth_check();
     
        /*
     $all_published_category_id = Category::where('publicationStatus', 1)->get();
     $all_published_manufacture_id = Manufacture::where('publicationStatus', 1)->get();  
     $all_published_sub_category_id = SubCategory::where('publicationStatus', 1)->get();
        */
        
        
         $all_published_category_id=DB::table('tbl_categories')
                  ->where('category_publicationStatus',1)
                  ->get();
         
//                 echo '<pre>';
//       print_r($all_published_category_id);
//       exit();

             
         $all_published_sub_category_id=DB::table('tbl_sub_categories')
                  ->where('sub_category_publicationStatus',1)
                  ->get();
         
//                 echo '<pre>';
//       print_r($all_published_sub_category_id);
//       exit();
    
         
            $all_published_mini_category_id=DB::table('tbl_mini_categories')
                  ->where('mini_category_publicationStatus',1)
                  ->get();
         
//                 echo '<pre>';
//       print_r($all_published_mini_category_id);
//       exit();
            
                $all_published_manufacture_id=DB::table('tbl_manufactures')
                  ->where('manufacture_publicationStatus',1)
                  ->get();
         
//                 echo '<pre>';
//       print_r($all_published_manufacture_id);
//       exit();
        
        

        $createProduct = view('admin.product.createProduct')
                   ->with('all_published_category_id',$all_published_category_id)
                  ->with('all_published_sub_category_id',$all_published_sub_category_id)
                 ->with('all_published_mini_category_id',$all_published_mini_category_id)
                  ->with('all_published_manufacture_id',$all_published_manufacture_id);

        return view('admin.master')
                        ->with('mainContent', $createProduct);
    }
    
    
    
    public function storeProduct(Request $request) {
     // echo"<pre>";
      //  return  $request->all();
        
  
       $product = array();
          $product['product_name'] = $request->product_name; 
          $product['category_id'] = $request->category_id;
          $product['sub_category_id'] = $request->sub_category_id;
          $product['mini_category_id'] = $request->mini_category_id;
          $product['manufacture_id'] = $request->manufacture_id;
          $product['product_price'] = $request->product_price;
          $product['product_size'] = $request->product_size;
          $product['product_quantity'] = $request->product_quantity;
          $product['product_short_description'] = $request->product_short_description;
          $product['product_long_description'] = $request->product_long_description;
          $product['product_publicationStatus'] = $request->product_publicationStatus;  
          $get_product_id=DB::table('tbl_products')->insertGetId($product);
        //  echo"product save in product table";
//exit();
                    $this->ProductImage($request, $get_product_id);
         return redirect('/wp-admin/master/product/manage')->with('product_message','Product info Save Successfully');  
    }//storeFunction
     protected function ProductImage($request, $get_product_id) {
            $product_id=$get_product_id; 
            
            for($i=1;$i<=3;$i++){
                  $productImage=$request->file('productImage'.$i);
                  $name=$productImage->getClientOriginalName();
                  $uploadPath='public/productImage/';
                  $productImage->move($uploadPath, $name);
                  $imaeUrl=$uploadPath.$name;
                  $this->saveProductImage($product_id,$imaeUrl,$i); 
            } 

    }//end of function
    
    protected function saveProductImage($product_id,$imaeUrl,$i) {
            $product_image = array();
            $product_image['product_id']=$product_id;
            $product_image['image_url']=$imaeUrl;
            $product_image['image_label']=$i;
           DB::table('tbl_product_images')->insert($product_image);
    }








    
    


    public function manageProduct() {
      $this->admin_login_auth_check();
      //  return  'page note ready';
                $all_product_info=DB::table('tbl_products')
                ->join('tbl_categories','tbl_products.category_id','=', 'tbl_categories.category_id')
                ->join('tbl_manufactures','tbl_products.manufacture_id','=', 'tbl_manufactures.manufacture_id')
                ->join('tbl_sub_categories','tbl_products.sub_category_id','=', 'tbl_sub_categories.sub_category_id')

                ->select('tbl_products.product_id',
                  'tbl_products.product_name',
                    'tbl_products.product_price',
                     'tbl_products.product_size',
                       'tbl_products.product_quantity',
                            'tbl_products.product_publicationStatus',
                              'tbl_categories.category_name',
                                'tbl_manufactures.manufacture_name','tbl_sub_categories.sub_category_name')

                   ->get();
         
      // echo '<pre>';
      // print_r($all_product_info);
      // exit();
    
        $showProduct = view('admin.product.manageProduct')
                   ->with('all_product_info',$all_product_info);
                  
        return view('admin.master')
                        ->with('mainContent', $showProduct);
        
    }


    public function viewProduct($product_id){
       $this->admin_login_auth_check();

 echo $product_id;
// exit();
         /*
          $productById=DB::table('tbl_products')
                ->join('tbl_categories','tbl_products.category_id','=', 'tbl_categories.category_id')
                ->join('tbl_manufactures','tbl_products.manufacture_id','=', 'tbl_manufactures.manufacture_id')
                
                ->join('tbl_sub_categories','tbl_products.sub_category_id','=', 'tbl_sub_categories.sub_category_id')

                ->join('tbl_mini_categories','tbl_products.mini_category_id','=', 'tbl_mini_categories.sub_category_id')

                ->select('tbl_products.*',
                  'tbl_categories.category_name',
                  'tbl_manufactures.manufacture_name','tbl_sub_categories.sub_category_name','tbl_mini_categories.mini_category_name')
                ->where('tbl_products.product_id', $product_id)
                ->first();
*/

                  $productById=DB::table('tbl_products')
                  ->join('tbl_categories','tbl_products.category_id','=', 'tbl_categories.category_id')
                  ->join('tbl_manufactures','tbl_products.manufacture_id','=', 'tbl_manufactures.manufacture_id')
                  ->join('tbl_sub_categories','tbl_products.sub_category_id','=', 'tbl_sub_categories.sub_category_id')
                   ->join('tbl_mini_categories','tbl_products.mini_category_id','=', 'tbl_mini_categories.mini_category_id')


                     
                ->select('tbl_products.*','tbl_categories.category_name',
                  'tbl_manufactures.manufacture_name','tbl_sub_categories.sub_category_name','tbl_mini_categories.mini_category_name')
                ->where('tbl_products.product_id', $product_id)
                ->first();

       //   echo '<pre>';
       // print_r($productById);
       // exit();
    


        $showProduct = view('admin.product.viewProduct')
                   ->with('productById',$productById);

         return view('admin.master')
                        ->with('mainContent', $showProduct);


    }
    
    



  public function unpublishedProduct($id){    
     // return $id;
        $data=array();
        $data['product_publicationStatus']=0;
        DB::table('tbl_products')
                ->where('product_id',$id)
                 ->update($data);
        
         session::put('product_message','publication status change successfully');
          return redirect('/wp-admin/master/product/manage')->with('message','Product info Save Successfully'); 
         
    }
    
      public function publishedProduct($id){
          // return $id;
        $data=array();
        $data['product_publicationStatus']=1;
        DB::table('tbl_products')
                ->where('product_id',$id)
                 ->update($data);
        
         session::put('product_message','publication status change successfully');
          return redirect('/wp-admin/master/product/manage')->with('message','Product info Save Successfully');

      }
        



    

}
//end of productController 
