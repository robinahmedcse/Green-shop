<?php

namespace App\Http\Controllers\admin\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;





class subCategoryController extends Controller
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
         
           $all_published_main_category=DB::table('tbl_categories')
               ->Where('category_publicationStatus',1)
               ->select('*')
               ->get();
           
        
        $createCategory = view('admin.category.sub-category.createSubCategory')
                ->with('all_published_main_category', $all_published_main_category);
        
        
        
        return view('admin.master')
                ->with('mainContent', $createCategory);
                
    }
    
    
    
    

    public function saveSubCategory(Request $request) {
   //  return $request->all();
        
        $this->validate($request, [
            'category_id' => 'required',
            'sub_category_name' => 'required',
            'sub_category_description' => 'required',
            'sub_category_publicationStatus' => 'required'
           ]);

        $data=array();
        $data['category_id'] = $request->category_id;
        $data['sub_category_name'] = $request->sub_category_name;
        $data['sub_category_description'] = $request->sub_category_description;
        $data['sub_category_publicationStatus'] = $request->sub_category_publicationStatus;
   
   
        
        DB::table('tbl_sub_categories')->insert($data);
        session::put('sub_category_message','All information Save Successfully');
        return redirect::to('/wp-admin/master/category/sub/manage');
        
    }//  saveCategory
    
       public function showSubCategory()  {
  
             $this->admin_login_auth_check();
                 
          /*   
             $all_sub_categoriesD=B::table('tbl_sub_categories')
               ->select('*')
              ->get();
              //      ->paginate(15);
            */ 
                 $all_sub_categories =DB::table('tbl_sub_categories')
                ->join('tbl_categories','tbl_sub_categories.category_id','=', 'tbl_categories.category_id')
                ->select('tbl_categories.*','tbl_sub_categories.*')
                ->get();
          
             
           
       
 //      echo'<pre>';
//       print_r($all_sub_categories);
//       exit();
             
       $m_subCategory= view('admin.category.sub-category.manageSubCategory')
               ->with('all_sub_categories',$all_sub_categories);
       
       return view('admin.master')->with('mainContain',$m_subCategory);
    }//showMainCategory
    
    
      public function unpublishedSubCategory($id){    
         //return $id;
        $data=array();
        $data['sub_category_publicationStatus']=0;
        DB::table('tbl_sub_categories')
                ->where('sub_category_id',$id)
                 ->update($data);
        
         session::put('sub_category_message','publication status change successfully');
          return redirect::to('/wp-admin/master/category/sub/manage');
         
    }
    
      public function publishedSubCategory($id){
          // return $id;
       $data['sub_category_publicationStatus']=1;
        DB::table('tbl_sub_categories')
                ->where('sub_category_id',$id)
                 ->update($data);
        
          
           
        session::put('sub_category_message','publication status change successfully');
           return redirect::to('/wp-admin/master/category/sub/manage');
          
    }
    
    
    
    
    
    
    
      public function editSubCategory($id)
    {

          $sub_categories=DB::table('tbl_sub_categories')
                             ->where('sub_category_id',$id)
                              ->first();
        
        $category= view('admin.category.sub-category.editSubCategory')
                ->with('sub_categories',$sub_categories);
        
        return view('admin.master')->with('mainContain',$category);
        
    }
    
    
     public function updateSubCategory(Request $request)
    {
      //return $request->all();
  
         $category_sub_id= $request->sub_category_id;

        $data=array();
        $data['sub_category_name'] = $request->sub_category_name;
        $data['sub_category_description'] = $request->sub_category_description;
        $data['sub_category_publicationStatus'] = $request->publicationStatus;
     
         DB::table('tbl_sub_categories')
                 ->where('sub_category_id',$category_sub_id)
                 ->update($data);
         
         session::put('sub_category_message','All info update Successfully');
           return redirect::to('/wp-admin/master/category/sub/manage');
          
    }
    
    
    
    
    
    
      public function deleteSubCategory($id) {
       
        DB::table('tbl_sub_categories')->where('sub_category_id',$id)->delete();
         
         session::put('sub_category_message',' Information delete Successfully');
         return redirect::to('/wp-admin/master/category/sub/manage');
          
    }
    
    
    
    
    
}//end of subCategoryController
