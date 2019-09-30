<?php

namespace App\Http\Controllers\admin\category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



class mainCategoryController extends Controller
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
         
        $createCategory = view('admin.category.main-category.createCategory');
        return view('admin.master')->with('mainContent', $createCategory);
    }

    public function saveMainCategory(Request $request) {
       // return $request->all();
        
        $this->validate($request, [
            'category_name' => 'required',
            'category_description' => 'required',
            'category_publicationStatus' => 'required'
           ]);

        $data=array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['category_publicationStatus'] = $request->category_publicationStatus;
   
       // echo $data['publication_status'];
        
        DB::table('tbl_categories')->insert($data);
        session::put('main_category_message','All information Save Successfully');
        return redirect::to('/wp-admin/master/category/main/manage');
        
    }//  saveCategory
    
       public function showMainCategory()  {
  
             $this->admin_login_auth_check();
                 
             
             $all_main_categories=DB::table('tbl_categories')
               ->select('*')
              ->get();
            //      ->paginate(15);
       
//       echo'<pre>';
//       print_r($all_main_categories);
//       exit();
             
       $m_mainCategory= view('admin.category.main-category.manageCategory')
               ->with('all_main_categories',$all_main_categories);
       
       return view('admin.master')->with('mainContain',$m_mainCategory);
    }//showMainCategory
    
    
      public function unpublishedMainCategory($id){    
         //return $id;
        $data=array();
        $data['category_publicationStatus']=0;
        DB::table('tbl_categories')
                ->where('category_id',$id)
                 ->update($data);
        
         session::put('main_category_message','publication status change successfully');
          return redirect::to('/wp-admin/master/category/main/manage');
         
    }
    
      public function publishedMainCategory($id){
          // return $id;
       $data['category_publicationStatus']=1;
        DB::table('tbl_categories')
                ->where('category_id',$id)
                 ->update($data);
        
          
           
        session::put('main_category_message','publication status change successfully');
           return redirect::to('/wp-admin/master/category/main/manage');
          
    }
    
      public function editMainCategory($id)
    {

        $infos_by_id=DB::table('courses')
                             ->where('course_id',$id)
                              ->first();
        
        
//        echo '<pre>';
//       print_r($infos_by_id);
//       exit();

        
        $edit_infos= view('admin.course.editInfos')->with('infos_by_id',$infos_by_id);
        
        return view('admin.master')->with('mainContain',$edit_infos);
    }
    
    
     public function updateMainCategory(Request $request)
    {
      //   return $request->all();

         $id_infos = $request->course_Id;

        $this->validate($request, [
            'category_name' => 'required',
            'category_description' => 'required',
            'category_publicationStatus' => 'required'
        ]);


 
          $data=array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['category_publicationStatus'] = $request->category_publicationStatus;
   

        $data['updated_at']=date("y-m-d");
         
         DB::table('courses')
                 ->where('course_id',$id_infos)
                 ->update($data);
         
         
         session::put('main_category_message','All info update Successfully');
           return redirect::to('/wp-admin/master/category/main/manage');
          
    }
    
    
      public function deleteMainCategory($id) {
       
        DB::table('tbl_infos')->where('infos_id',$id)->delete();
         
         session::put('main_category_message',' Information delete Successfully');
         return redirect::to('/wp-admin/master/category/main/manage');
          
    }
    
    
    
    
    
    
    
    
}//end of mainCategoryController
