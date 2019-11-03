<?php

namespace App\Http\Controllers\admin\set;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class womanBanner extends Controller
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
		   $create= view('admin.woman_banner.createWomanBanner');
                
        return view('admin.master')
                ->with('mainContent', $create);
		 
		 
		 
	}
	
	
	public function storePhoto(Request $request){
	 //return $request->all();
                   
            $this->validate($request, [
            'banner_description' => 'required',
             'banner_publication_status'=> 'required'
        ]);
        
         $imaeUrl= $this->image_save($request);
        
         $data=array();
         $data['woman_pro_name'] = $request->banner_description;
         $data['woman_pro_image_url'] =$imaeUrl;
         $data['publication_status'] = $request->banner_publication_status;
   
   
        
         DB::table('tbl_women_pro')->insert($data);
         return redirect('/wp-admin/master/banner/woman/manage')
                 ->with('woman_message','Banner info Save Successfully'); 
        
                     
	}
        
           protected function image_save($request) {
          $productImage=$request->file('man_banner_image');
                  $name=$productImage->getClientOriginalName();
                  $uploadPath='public/banner_image/';
                  $productImage->move($uploadPath, $name);
                  $imaeUrl=$uploadPath.$name;
                  
                  return $imaeUrl;
                  
    }
    
	
	  
	public function showAllPhoto(){
		  $this->admin_login_auth_check();
       
        $all_banners=DB::table('tbl_women_pro')
               ->select('*')
              ->get();
        
         $manBaner= view('admin.woman_banner.manageWomanBanner')
               ->with('all_banners',$all_banners);
       
       return view('admin.master')->with('mainContain',$manBaner);
        
	}
        
        
        
        
            
        public function unpublished($id){    
         //return $id;
        $data=array();
        $data['publication_status']=0;
        DB::table('tbl_women_pro')
                 ->where('woman_pro_id',$id)
                 ->update($data);
        
         session::put('woman_message','publication status change successfully');
          return redirect::to('/wp-admin/master/banner/woman/manage');
 
    }
    
      public function published($id){
          // return $id;
       $data['publication_status']=1;
        DB::table('tbl_women_pro')
                ->where('woman_pro_id',$id)
                 ->update($data);
        
             
          session::put('woman_message','publication status change successfully');
          return redirect::to('/wp-admin/master/banner/woman/manage');
    }
        
        
        
        
        
        
        
	
	public function edit($id){
		    $banner_by_id=DB::table('tbl_women_pro')
                             ->where('woman_pro_id',$id)
                               ->first();
//        echo '<pre>';
//       print_r($banner_by_id);
//       exit();
        
        $edit_banner= view('admin.woman_banner.editWomanBanner')
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
         $data['woman_pro_name'] = $request->banner_description;
         $data['publication_status'] = $request->banner_publication_status;
   
         DB::table('tbl_women_pro')
                ->where('woman_pro_id', $get_id)
                 ->update($data);
         
         
         session::put('woman_message','Update successfully');
          return redirect::to('/wp-admin/master/banner/woman/manage');
         

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
        $product_image['man_pro_image_url'] = $imaeUrl;
        DB::table('tbl_men_pro')
                ->where('men_pro_id', $product_id)
                 ->update($product_image);
    }

    
	
        
        
        
        
        
        
        
	public function delete($id){
            
            //return $id;
		 DB::table('tbl_women_pro')
                ->where('woman_pro_id',$id)
                ->delete();
    
         session::put('woman_message','Delete Info Successfully');
          return redirect::to('/wp-admin/master/banner/woman/manage');
         
	}
	
	
   


}
