<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class adminRegController extends Controller
{
 
         public function showRegForm() {
       return view('admin.login.regContent');
        
 
       
    }
    
    
    public function storeInfo(Request $request){
        
    //  return $request->all();
        
            $this->validate($request, [
            'admin_name' => 'required',
            'admin_email' => 'required',
            'admin_password' => 'required'
        ]);
      
         $My_password=$request->admin_password;
        
         $salted_1="a6ds1jm@#2$%yk7fhs.kazd3nhfs4jkdx8fds!^&*)(}rgaV5Y9hwtb2sMHjGwR";
         $salted_2="!@ktfjdr-kj#sgcefgfb%j^pjl+&kojk*j(g)hZzFoQXEVYCtIQCD7U28p56QS";
         $admin_pass_salted=$salted_2.$My_password.$salted_1;
         $hashed_password=hash('whirlpool',$admin_pass_salted);
         $dobul_hashed_password=hash('gost',$hashed_password);
         
          
         $iteration = 1000;
         $salt_admin = "d!n#qv%krys^flhb&fj-sweqafzgkdsa+(RoBin+AhMed+CSE)oghx+ijdkm-vlktycq@mv.oKrdf*jgp>sij;vl<dkvp";
         $admin_password = hash_pbkdf2("haval256,5", $dobul_hashed_password, $salt_admin, $iteration, 199);
         
        // echo $admin_password;
         
  
        $data=array();
        $data['admin_name']=$request->admin_name;
        $data['admin_email']=$request->admin_email;
        $data['admin_password']=$admin_password;
        $data['admin_role_id']=1;
        
        DB::table('tbl_admins')->insert($data);
        session::put('exception','Admin Info Add Successfully.........Please Login Now');
        return redirect::to('/wp/admin/master/login/form/showing');
         
    }
            
    
    
    
}
