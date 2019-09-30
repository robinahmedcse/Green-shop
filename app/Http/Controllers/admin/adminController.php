<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use DB;


class adminController extends Controller
{
    
    
   public function admin_login_auth_check() {

        session_start();
        $admin_id = Session::get('admin_id');

        if ($admin_id == NUll) {
            redirect::to('/login')->send();
        }
    }
    
       public function dashboard() {
           
           $this->admin_login_auth_check();

         $homeContent =view('admin.home.homeContent');
         return view('admin.master')->with('x',$homeContent);
       
    }
    
       public function createNews() {
      // return view('admin.category.createCategory'); 
       
       $createNews=view('admin.category.createNews'); 
         return view('admin.master')->with('x',$createNews); 
       }//createCategory
    
    
       public function saveNews(Request $request) {
 //return $request->all();
        
        $this->validate($request, [
            'news' => 'required',
            'publicationStatus' => 'required'
        ]);
  
        $data=array();
        $data['news_des']=$request->news;
        $data['publicationStatus']=$request->publicationStatus;
        $data['created_at']=date("y-m-d");
            
       // echo $data['publication_status'];
        
        
        DB::table('news')->insert($data);
        session::put('message','News Save Successfully');
        return redirect::to('admin/manage/news');
        
        
    }//  saveCategory
    
    
        public function show()  {
  

       $all_news=DB::table('news')
               ->select('*')
               ->get();
       
       $manage_news= view('admin.category.manageNews')
               ->with('all_news',$all_news);
       
       return view('admin.master')->with('mainContain',$manage_news);
    }
    
    
     public function unpublished($id){    
         
        $data=array();
        $data['publicationStatus']=0;
        DB::table('news')
                ->where('news_id',$id)
                 ->update($data);
        
         session::put('message','News info Unpublished Successfully');
         return redirect('admin/manage/news');
         
    }
    
    
      public function published($id){
          
       $data['publicationStatus']=1;
        DB::table('news')
                ->where('news_id',$id)
                 ->update($data);
        
          
           
         session::put('message','News info published Successfully');
         return redirect('admin/manage/news');
          
    }
    
    
    
    
        public function editNews($id)
    {

        $news_info_by_id=DB::table('news')
                             ->where('news_id',$id)
                              ->first();
        
        
//                      echo '<pre>';
//                      print_r($news_info_by_id);
//                   echo $news_info_by_id->news_id;
//                 exit();
        
        $edit_news = view('admin.category.editNews')->with('news_info_by_id',$news_info_by_id);
        
        return view('admin.master')->with('mainContain',$edit_news);
    }
    
    
    
     public function updateNews(Request $request)
    {
//return $request->all();
        $id_news=$request->newsId;
      
        $this->validate($request, [
            'news' => 'required',
            'publicationStatus' => 'required'
        ]);
  
        $data=array();
        $data['news_des']=$request->news;
        $data['publicationStatus']=$request->publicationStatus;
        $data['created_at']=date("y-m-d");
         
         
         DB::table('news')
                 ->where('news_id',$id_news)
                 ->update($data);
         
         
         session::put('message','News info update Successfully');
         return redirect('admin/manage/news');
          
    }
    
    
    
    
    
      public function deleteNews($id) {
       
        DB::table('news')->where('news_id',$id)->delete();
         
         session::put('message','New info delete Successfully');
        return redirect('admin/manage/news');
          
    }
    
    
    
    
    
    
    
        public function adminlogout() {
        
          Session::put('admin_id',NULL);
          Session::put('admin_name',NULL);
          return redirect('/login')->with('exception','You are Logout successfully');
    }   
    
    
    
    
}//end of adminController
