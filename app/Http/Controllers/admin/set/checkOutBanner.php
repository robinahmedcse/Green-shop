<?php

namespace App\Http\Controllers\admin\set;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;





class checkOutBanner extends Controller
{
    
    protected function admin_login_auth_check( ) {
          session_start();
        $admin_id = session::get('admin_id');
        $admin_role = session::get('admin_role');

        if ($admin_id == NUll && $admin_role == NUll) {
            redirect::to('/wp/admin/master/login/form/showing')->send();
        }
    }
   
   
   
	
	
	public function index(){
		   
            $this->admin_login_auth_check();
		   $create= view('admin.ch_banner.createChBanner');
                
        return view('admin.master')
                ->with('mainContent', $create);
		 
		 
		 
	}
	
	
	public function storePhoto(Request $request){
	// return $request->all();
                   
            $this->validate($request, [
            'banner_description' => 'required',
             'banner_publication_status'=> 'required'
        ]);
        
         $imaeUrl= $this->image_save($request);
        
         $data=array();
         $data['checkout_pro_name'] = $request->banner_description;
         $data['checkout_pro_image_url'] =$imaeUrl;
         $data['publication_status'] = $request->banner_publication_status;
   
   
        
         DB::table('tbl_checkout_pro')->insert($data);
         return redirect('/wp-admin/master/banner/checkout/manage')
                 ->with('man_message','Banner info Save Successfully'); 
        
                     
	}
        
           protected function image_save($request) {
          $productImage=$request->file('ch_banner_image');
                  $name=$productImage->getClientOriginalName();
                  $uploadPath='public/banner_image/';
                  $productImage->move($uploadPath, $name);
                  $imaeUrl=$uploadPath.$name;
                  
                  return $imaeUrl;
                  
    }
    
	
	  
	public function showAllPhoto(){
		  $this->admin_login_auth_check();
       
        $all_banners=DB::table('tbl_checkout_pro')
               ->select('*')
              ->get();
        
         $manBaner= view('admin.ch_banner.manageChBanner')
               ->with('all_banners',$all_banners);
       
       return view('admin.master')->with('mainContain',$manBaner);
        
	}
        
        
        
        
            
        public function unpublished($id){    
         //return $id;
        $data=array();
        $data['publication_status']=0;
        DB::table('tbl_checkout_pro')
                 ->where('checkout_pro_id',$id)
                 ->update($data);
        
         session::put('man_message','publication status change successfully');
          return redirect::to('/wp-admin/master/banner/checkout/manage');
 
    }
    
      public function published($id){
          // return $id;
       $data['publication_status']=1;
        DB::table('tbl_checkout_pro')
                ->where('checkout_pro_id',$id)
                 ->update($data);
        
             
          session::put('man_message','publication status change successfully');
          return redirect::to('/wp-admin/master/banner/checkout/manage');
    }
        
        
        
        
        
        
        
	
	public function edit($id){
		    $banner_by_id=DB::table('tbl_checkout_pro')
                             ->where('checkout_pro_id',$id)
                               ->first();
//        echo '<pre>';
//       print_r($banner_by_id);
//       exit();
        
        $edit_banner= view('admin.ch_banner.editChBanner')
               ->with('banner_by_id',$banner_by_id);
       
       return view('admin.master')->with('mainContain',$edit_banner);
         
	}
	
	
	public function updateWoman(Request $request){
           
              $image = $request->file();
              $get_id = $request->banner;
              
         if ($image != NULL) {
             $this->productImageUpdate($request, $get_id);
        }
        
       
         
         $data=array();
         $data['checkout_pro_name'] = $request->banner_description;
         $data['publication_status'] = $request->banner_publication_status;
   
         DB::table('tbl_checkout_pro')
                ->where('checkout_pro_id', $get_id)
                 ->update($data);
         
         
         session::put('man_message','Update successfully');
          return redirect::to('/wp-admin/master/banner/checkout/manage');
         

    }// end of updateMan
    
    
    
      protected function productImageUpdate($request, $get_product_id) {
            
            $product_id = $get_product_id;
            $productImage = $request->file('banner_image');
            $name = $productImage->getClientOriginalName();
            $uploadPath = 'public/banner_image/';
            $productImage->move($uploadPath, $name);
            $imaeUrl = $uploadPath . $name;
            
              $this->productImage_update($product_id, $imaeUrl);
        }
        
        protected function productImage_update($product_id, $imaeUrl) {
        $product_image = array();
        $product_image['checkout_pro_image_url'] = $imaeUrl;
        DB::table('tbl_checkout_pro')
                ->where('checkout_pro_id', $product_id)
                 ->update($product_image);
    }

    
	
        
        
        
        
        
        
        
	public function delete($id){
            
         
		 DB::table('tbl_checkout_pro')
                ->where('checkout_pro_id',$id)
                ->delete();
    
         session::put('man_message','Delete Info Successfully');
          return redirect::to('/wp-admin/master/banner/checkout/manage');
         
	}
	
	
	
	
}
