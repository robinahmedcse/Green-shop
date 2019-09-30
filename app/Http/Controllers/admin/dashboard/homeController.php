<?php

namespace App\Http\Controllers\admin\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class homeController extends Controller
{
  
        
    public function admin_login_auth_check() {

        session_start();
        $admin_id = Session::get('admin_id');
        $admin_role = Session::get('admin_role');

        if ($admin_id == NUll && $admin_role == NUll) {
            redirect::to('/wp/admin/master/login/form/showing')->send();
        }
    }
        
     
    
        
       public function dashboard() {
           
           $this->admin_login_auth_check();

       $homeContent =view('admin.home.homeContent');
        return view('admin.master')->with('mainContent',$homeContent);
       
    }
    
         public function logout() {

         Session::put('admin_id', NULL);
         Session::put('admin_name', NULL);
         Session::put('admin_role', NULL);
         Session::put('admin_status', NULL);

        return redirect('/wp/admin/master/login/form/showing')->with('exception','You are Logout successfully');
   
       
    }
    
    
    
    
}//end of home controller
