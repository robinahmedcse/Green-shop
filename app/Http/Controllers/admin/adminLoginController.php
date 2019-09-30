<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class adminLoginController extends Controller
{
    
      
    
        public function admin_login_auth_check() {

        session_start();
        $admin_id = Session::get('admin_id');
        $admin_role = Session::get('admin_role');

        if ($admin_id != NUll && $admin_role != NUll) {
            redirect::to('/wp-admin/master/dashboard')->send();
        }
    }
        
    
      public function showLoginForm() {
          
          $this->admin_login_auth_check();
       return view('admin.login.loginContent');
        
    }
    
    public function adminCheckLogin(Request $request) {
    //    return  $request ->all();
         
                 $this->validate($request, [
        
            'admin_email' => 'required',
            'admin_password' => 'required'
        ]);
                 
               $My_email=$request->admin_email;
               $My_password=$request->admin_password;
          
      
         $My_password=$request->admin_password;
        
         $salted_1="a6ds1jm@#2$%yk7fhs.kazd3nhfs4jkdx8fds!^&*)(}rgaV5Y9hwtb2sMHjGwR";
         $salted_2="!@ktfjdr-kj#sgcefgfb%j^pjl+&kojk*j(g)hZzFoQXEVYCtIQCD7U28p56QS";
         $admin_pass_salted=$salted_2.$My_password.$salted_1;
         $hashed_password=hash('whirlpool',$admin_pass_salted);
         $dobul_hashed_password=hash('gost',$hashed_password);
         
          
         $iteration = 1000;
         $salt_admin = "d!n#qv%krys^flhb&fj-sweqafzgkdsa+(RoBin+AhMed+CSE)oghx+ijdkm-vlktycq@mv.oKrdf*jgp>sij;vl<dkvp";
         $admin_password = hash_pbkdf2("haval256,5", $dobul_hashed_password, $salt_admin, $iteration, 199);
   
       
       
          $admin_info = DB::table('tbl_admins')
                     ->where('admin_email', $My_email)
                      ->where('admin_password', $admin_password)
                     ->first();
          
//              echo '<pre>';
//             print_r($admin_info);
//             exit();
             
          if ($admin_info) {       
                 $status=$admin_info->admin_status;
     
                        if ($status == '1') {
                          Session::put('admin_id', $admin_info->admin_id);
                          Session::put('admin_name', $admin_info->admin_name);
                          Session::put('admin_role', $admin_info->admin_role_id);
                          Session::put('admin_status', $status);
                          return redirect('/wp-admin/master/dashboard');
                      } else {
                         return redirect('/wp/admin/master/login/form/showing')->with('exception','Your Account is Disable'); 
                          
                      }
        } 
        
        else {
               return redirect('/wp/admin/master/login/form/showing')->with('exception','Invalid'); 
        }
        
    }//end of adminCheckLogin
    
 
    
    
    
}//end of adminController
