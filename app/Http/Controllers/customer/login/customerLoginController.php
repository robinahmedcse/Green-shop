<?php

namespace App\Http\Controllers\customer\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class customerLoginController extends Controller
{
    
     
    protected function customer_login_auth_check() {

        session_start();
          $customer_id = Session::get('user_customer_id');

        if ($customer_id != NUll ) {
            redirect::to('customer/dashboard')->send();
        }
    }
    
    
    
      public function showLoginForm() {
      //    $this->customer_login_auth_check();
  //Session::flush();
        $createRegForm = view('frontEnd.login.login');
        return view('frontEnd.master')->with('mainContent', $createRegForm);
 
    }
    
    
      public function userCheckLogin(Request $request) {
          
            
      //return  $request ->all();
         
              $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
           ]);
                 
               $My_email=$request->email;
               $My_password=$request->password;
          
         $salted_1="a6dbs1jvm@#2$%yk7fbhs.ggfsddg!^&*)(}rgaV5Y9hwtb2sMHjGwR";
         $salted_2="!@ktfjdr-kj#sgcqfgfb%j^pjll+&kojk*j(g)hZzFoQXEVYCtIQCD7U2b8p56QS";
         $admin_pass_salted=$salted_2.$My_password.$salted_1;
         $hashed_password=hash('whirlpool',$admin_pass_salted);
         $dobul_hashed_password=hash('gost',$hashed_password);
          
         $iteration = 1000;
         $salt_admin = "d!nf#qv%krys^flhb&fj-sgweqafzgkdsa+(RoBin+AhMed+CSE)oghx+ijdkm-vlktmycq@mv.oKrdf*jgup>sij;vl<dkvp";
         $admin_password = hash_pbkdf2("haval256,5", $dobul_hashed_password, $salt_admin, $iteration, 199);

       
          $admin_info = DB::table('tbl_customers')
                     ->where('email', $My_email)
                      ->where('password', $admin_password)
                     ->first();
          
//              echo '<pre>';
//             print_r($admin_info);
//             exit();
             
          if ($admin_info) {       
                
                 Session::put('user_customer_id', $admin_info->customer_id);
                 Session::put('user_customer_name', $admin_info->customer_name);
                 //Session::put('user_shipping_id', NULL);
                // Session::put('order_id', NULL);
               
                 return redirect('customer/dashboard');
         
        } 
        
        else {
               return redirect('customer/login')->with('exception','Invalid'); 
        }
        
    }//end of adminCheckLogin
    
}//customerLoginController
