<?php

namespace App\Http\Controllers\customer\order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



class customerOrderController extends Controller
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
    
           
    public function orderView() {
        $this->customer_login_auth_check();
        
        $customer_id = Session::get('user_customer_id');
        
                    $orders= DB::table('tbl_orders')
                ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'tbl_orders.customer_id')
                ->select('tbl_customers.customer_name', 'tbl_orders.*')
                ->get();
          
//             echo '<pre>';
//             print_r($orders);    
//            exit();
            
        
        /*
                $orders= DB::table('tbl_orders')
                ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'tbl_orders.customer_id')
                ->join('tbl_payments', 'tbl_payments.order_id', '=', 'tbl_orders.order_id')
                ->join('tbl_order_details', 'tbl_order_details.order_id', '=', 'tbl_orders.order_id')   
                ->select('tbl_customers.customer_name', 'tbl_orders.*','tbl_payments.*',
                        'tbl_order_details.*')
                ->where('tbl_orders.customer_id', $customer_id)
                ->get();
          */
//             echo '<pre>';
//             print_r($orders);    
//            exit();
//            
             
        
         $createOrder = view('frontEnd.customer.order.order')
                  ->with('orders',$orders);
         return view('frontEnd.customer.userMaster')->with('mainContent', $createOrder);
    }
    
    
    
    
        public function totalOrderView($id) {
        $this->customer_login_auth_check();
        
        $customer_id = Session::get('user_customer_id');
   /*     
                    $orders= DB::table('tbl_orders')
                ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'tbl_orders.customer_id')
                ->select('tbl_customers.customer_name', 'tbl_orders.*')
                ->get();
          
             echo '<pre>';
             print_r($orders);    
            exit();
     */       
        

                $orders= DB::table('tbl_orders')
                ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'tbl_orders.customer_id')
                ->join('tbl_payments', 'tbl_payments.order_id', '=', 'tbl_orders.order_id')
                ->join('tbl_order_details', 'tbl_order_details.order_id', '=', 'tbl_orders.order_id')   
                ->select('tbl_customers.customer_name', 'tbl_orders.*','tbl_payments.*',
                        'tbl_order_details.*')
               
                ->where('tbl_orders.customer_id', $customer_id)
                ->where('tbl_orders.order_id', $id)
                ->get();
        
//             echo '<pre>';
//             print_r($orders);    
//            exit();
            
             
        
         $createOrder = view('frontEnd.customer.order.viewOrder')
                  ->with('orders',$orders);
         return view('frontEnd.customer.userMaster')->with('mainContent', $createOrder);
    }
    
    
    
    
}// end of customerOrderController
