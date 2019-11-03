<?php

namespace App\Http\Controllers\banner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



class bannerController extends Controller
{
    
    
          public function admin_login_auth_check() {

        session_start();
        $admin_id = session::get('admin_id');
        $admin_role = session::get('admin_role');

        if ($admin_id == NUll && $admin_role == NUll) {
            redirect::to('/wp/admin/master/login/form/showing')->send();
        }
    }

    public function index() {
        
        $this->admin_login_auth_check();
        
         $createManufacture= view('admin.banner.createBanner');
                
        return view('admin.master')
                ->with('mainContent', $createManufacture);
    }
    
     
    public function save(Request $request) {
 //return  $request->all();
      
        
            $this->validate($request, [
            'banner_description' => 'required',
             'banner_publication_status'=> 'required'
        ]);
        
         $imaeUrl= $this->image_save($request);
        
         $data=array();
         $data['banner_description'] = $request->banner_description;
         $data['banner_image_url'] =$imaeUrl;
         $data['banner_publication_status'] = $request->banner_publication_status;
   
   
        
         DB::table('tbl_banners')->insert($data);
         return redirect('/wp-admin/master/banner/manage')->with('ban_message','Banner info Save Successfully'); 
        
    }
    
    protected function image_save($request) {
          $productImage=$request->file('banner_image');
                  $name=$productImage->getClientOriginalName();
                  $uploadPath='public/banner_image/';
                  $productImage->move($uploadPath, $name);
                  $imaeUrl=$uploadPath.$name;
                  
                  return $imaeUrl;
                  
    }
    
    
    
     
    public function manage() {
    
       $this->admin_login_auth_check();
       
        $all_banners=DB::table('tbl_banners')
               ->select('*')
              ->get();
        
         $manufactures= view('admin.banner..manageBanner')
               ->with('all_banners',$all_banners);
       
       return view('admin.master')->with('mainContain',$manufactures);
        
         
    }
    
    
    
    
    
    
        public function unpublished($id){    
         //return $id;
        $data=array();
        $data['banner_publication_status']=0;
        DB::table('tbl_banners')
                 ->where('banner_id',$id)
                 ->update($data);
        
         session::put('ban_message','publication status change successfully');
          return redirect::to('/wp-admin/master/banner/manage');
 
    }
    
      public function published($id){
          // return $id;
       $data['banner_publication_status']=1;
        DB::table('tbl_banners')
                ->where('banner_id',$id)
                 ->update($data);
        
             
          session::put('ban_message','publication status change successfully');
          return redirect::to('/wp-admin/master/banner/manage');
    }
    
    
    
     
    public function edit($id) {
        $banner_by_id=DB::table('tbl_banners')
                             ->where('banner_id',$id)
                              ->first();
//        echo '<pre>';
//       print_r($banner_by_id);
//       exit();
        
        $edit_banner= view('admin.banner.editBanner')
               ->with('banner_by_id',$banner_by_id);
       
       return view('admin.master')->with('mainContain',$edit_banner);
         
    }
    
     
    public function update (Request $request) {
  
       // return $request;
             $id = $request->banner;
        
         $imaeUrl= $this->image_save($request);
        
         $data=array();
         $data['banner_description'] = $request->banner_description;
         $data['banner_image_url'] =$imaeUrl;
         $data['banner_publication_status'] = $request->banner_publication_status;
   
   
        
         DB::table('tbl_banners')
                 ->where('banner_id',$id)
                 ->update($data);
  
         return redirect('/wp-admin/master/banner/manage')
                 ->with('ban_message','Banner info Update Successfully'); 
        
        
    }
    
     public function delete ($id) {
          // return    $id;
            
        DB::table('tbl_banners')
                ->where('banner_id',$id)
                ->delete();

                return redirect('/wp-admin/master/banner/manage')
                 ->with('ban_message','Banner info delete Successfully'); 
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
