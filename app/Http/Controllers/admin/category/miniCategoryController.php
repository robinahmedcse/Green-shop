<?php

namespace App\Http\Controllers\admin\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;




class miniCategoryController extends Controller
{
         public function admin_login_auth_check() {

        session_start();
        $admin_id = session::get('admin_id');
        $admin_role = session::get('admin_role');

        if ($admin_id == NUll && $admin_role == NUll) {
            redirect::to('/wp/admin/master/login/form/showing')->send();
        }
    }
    
     protected function generateRandomString($length = 25) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

    
    
    
    public function index() {
        
       
        $this->admin_login_auth_check();
        
         $all_published_sub_category=DB::table('tbl_sub_categories')
               ->Where('sub_category_publicationStatus',1)
               ->select('*')
               ->get();
           
         
        $createCategory = view('admin.category.mini-category.createMiniCategory')
               ->with('all_published_sub_category',$all_published_sub_category);
        
       return view('admin.master')->with('mainContent', $createCategory);
    }

    public function saveMiniCategory(Request $request) {
   //  return $request->all();
        
        $this->validate($request, [
            
             'sub_category_id' => 'required',
            'mini_category_name' => 'required',
            'mini_category_description' => 'required',
            'mini_category_publicationStatus' => 'required'
           ]);
        
          $randomString =  $this->generateRandomString();

        $data=array();
           $data['mini_category_url'] = $randomString;
        $data['sub_category_id'] = $request->sub_category_id;
        $data['mini_category_name'] = $request->mini_category_name;
        $data['mini_category_description'] = $request->mini_category_description;
        $data['mini_category_publicationStatus'] = $request->mini_category_publicationStatus;
   
   
        
        DB::table('tbl_mini_categories')->insert($data);
        session::put('mini_category_message','All information Save Successfully');
        return redirect::to('/wp-admin/master/category/mini/manage');
        
    }//  saveCategory
    
       public function showMimiCategory()  {
  
             $this->admin_login_auth_check();
                 
           /*  
             $all_mini_categories=DB::table('tbl_mini_categories')
               ->select('*')
              ->get();
            //      ->paginate(15);
             */
             
               $all_mini_categories =DB::table('tbl_mini_categories')
                ->join('tbl_sub_categories','tbl_sub_categories.sub_category_id','=', 'tbl_mini_categories.sub_category_id')
                ->select('tbl_mini_categories.*','tbl_sub_categories.*')
                ->get();
          
               
               
       
 //      echo'<pre>';
//       print_r($all_sub_categories);
//       exit();
             
       $m_miniCategory= view('admin.category.mini-category.manageminiCategory')
               ->with('all_mini_categories',$all_mini_categories);
       
       return view('admin.master')->with('mainContain',$m_miniCategory);
    }//showMainCategory
    
    
      public function unpublishedSMiniCategory($id){    
         //return $id;
        $data=array();
        $data['mini_category_publicationStatus']=0;
        DB::table('tbl_mini_categories')
                ->where('mini_category_id',$id)
                 ->update($data);
        
         session::put('mini_category_message','publication status change successfully');
          return redirect::to('/wp-admin/master/category/mini/manage');
         
    }
    
      public function publishedMiniCategory($id){
          // return $id;
       $data['mini_category_publicationStatus']=1;
        DB::table('tbl_mini_categories')
                ->where('mini_category_id',$id)
                 ->update($data);
        
          
           
        session::put('mini_category_message','publication status change successfully');
           return redirect::to('/wp-admin/master/category/mini/manage');
          
    }
    
      public function editMiniCategory($id)
    {

        $mini_categories=DB::table('tbl_mini_categories')
                             ->where('mini_category_id',$id)
                              ->first();
        
        
        $category= view('admin.category.mini-category.editMiniCategory')
                ->with('mini_categories',$mini_categories);
        
        return view('admin.master')->with('mainContain',$category);
    }
    
    
     public function updateMiniCategory(Request $request)
    {
       

         $id = $request->mini_category_id;

       $data=array();
      
        $data['mini_category_name'] = $request->mini_category_name;
        $data['mini_category_description'] = $request->mini_category_description;
        $data['mini_category_publicationStatus'] = $request->publicationStatus;
   
   
         $mini_categories=DB::table('tbl_mini_categories')
                             ->where('mini_category_id',$id)
                              ->update($data);
         
         
         session::put('mini_category_message','All info update Successfully');
           return redirect::to('/wp-admin/master/category/mini/manage');
          
    }
    
    
      public function deleteMiniCategory($id) {
       
        DB::table('tbl_mini_categories')->where('mini_category_id',$id)->delete();
         
         session::put('mini_category_message',' Information delete Successfully');
         return redirect::to('/wp-admin/master/category/mini/manage');
          
    }
    
    
    
    
    
    
    
    
    
    
}//end of miniCategoryController
