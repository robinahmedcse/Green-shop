<?php

namespace App\Http\Controllers\customer\profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



class customerProfileController extends Controller
{
     protected function customer_login_auth_check() {

        session_start();
          $customer_id = Session::get('user_customer_id');
         // echo $customer_id; 
          //exit();

        if ($customer_id == NUll ) {
            redirect::to('customer/login')->send();
        }
    }
    
    
    
    
        public function profileView() {
        $this->customer_login_auth_check();
        
        $customer_id = Session::get('user_customer_id');
        
                  $customer = DB::table('tbl_customers')
                      ->where('customer_id',$customer_id)     
                     ->first();
          
//             echo '<pre>';
//             print_r($customer_info);       
          //  exit();
      
        
         $createCustomerProfile = view('frontEnd.customer.profile.profile')
                  ->with('customer',$customer);
         return view('frontEnd.customer.userMaster')->with('mainContent', $createCustomerProfile);
    }//profileView
    
   
    
    
    
    
    
    
    public function profileEdit($customer_id) {

              $this->customer_login_auth_check();
        

                 $myProfile = DB::table('tbl_customers')
                ->where('tbl_customers.customer_id', $customer_id)
                ->first();

//             echo '<pre>';
//             print_r($myProfile);    
//            exit();
            
             $editCustomerProfile = view('frontEnd.customer.profile.editMyProfile')
                  ->with('myProfile',$myProfile);
         return view('frontEnd.customer.userMaster')->with('mainContent', $editCustomerProfile);
                  
 
        
    }



    public function profileUpdate(Request $request) {

        //  return $request->all();
        
             $profile_id = $request->customer_id;
      
        
              $data=array();
              $data['customer_name'] = $request->name ; 
              $data['phone'] = $request->phone ;
              $data['address'] = $request->address;
              $data['city'] = $request->city ;
              $data['thana'] = $request->thana;
              $data['post_office'] = $request->po ;
              $data['district'] = $request->district;
              $data['country'] = $request->country ;
 
         
         DB::table('tbl_customers')
                 ->where('customer_id',$profile_id)
                 ->update($data);
        
     
        return redirect('customer/profile/view'); 
    }
    
    
    
    
    
    
    
}// end of customerProfileController
