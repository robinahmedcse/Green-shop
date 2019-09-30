<?php

namespace App\Http\Controllers\customer\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class customerController extends Controller
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
    
    
    public function home() {
       $this->customer_login_auth_check();
        
         $createCustomerHome = view('frontEnd.customer.index.index');
         return view('frontEnd.customer.userMaster')->with('mainContent', $createCustomerHome);
 
    }
    
    

 

     public function customerLogout() {
         
          Session::put('user_customer_id',NULL);
          Session::put('user_customer_name',NULL);
          //Session::flush();
          return redirect('/');

    }
    
    
    
    
}/// end of customerController
