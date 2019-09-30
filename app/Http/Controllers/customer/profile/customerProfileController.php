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
    
    
    public function shippinsAddressView() {

              $this->customer_login_auth_check();
        
        $customer_id = Session::get('user_customer_id');
        

          
                 $orders = DB::table('tbl_orders')
                ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'tbl_orders.customer_id')
                ->join('tbl_payments', 'tbl_payments.order_id', '=', 'tbl_orders.order_id')
                
                ->select('tbl_customers.customer_name', 'tbl_orders.*')
                ->where('tbl_orders.customer_id', $customer_id)
                ->get();

             echo '<pre>';
             print_r($orders);    
            exit();
            
                  
 
        
    }
    
    
    
    
    
    
    
}// end of customerProfileController
