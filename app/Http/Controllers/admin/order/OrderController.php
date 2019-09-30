<?php

namespace App\Http\Controllers\admin\order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use PDF;


class OrderController extends Controller
{
    
           public function admin_login_auth_check() {

        session_start();
        $admin_id = session::get('admin_id');
        $admin_role = session::get('admin_role');

        if ($admin_id == NUll && $admin_role == NUll) {
            redirect::to('/wp/admin/master/login/form/showing')->send();
        }
    }
    
    
    
               
    public function orderView() {
        $this->admin_login_auth_check();

                $orders= DB::table('tbl_orders')
                ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'tbl_orders.customer_id')
                ->select('tbl_customers.customer_name', 'tbl_orders.*')
                ->get();
          
//             echo '<pre>';
//             print_r($orders);    
//            exit();
            
             
        
         $createOrder = view('admin.order.manageOrder')
                  ->with('orders',$orders);
         
           return view('admin.master')
                        ->with('mainContent', $createOrder);
    }
    
    
    
    
    public function singleOrderView($param) {

         $this->admin_login_auth_check();
        
                $customer_info_by_id= DB::table('tbl_orders')
                ->join('tbl_customers', 'tbl_customers.customer_id', '=', 'tbl_orders.customer_id')
               ->join('tbl_payments', 'tbl_payments.order_id', '=', 'tbl_orders.order_id')
                ->select('tbl_customers.*', 'tbl_orders.*',
                        'tbl_payments.*')
                ->first();
                
//         echo '<pre>';
//         print_r($customer_info_by_id);
//        exit();
                
                
$shipping_info_by_id= DB::table('tbl_orders')
                ->join('tbl_shippings', 'tbl_shippings.shipping_id', '=', 'tbl_orders.shipping_id')
                ->where('tbl_orders.order_id', $param)
                ->select('tbl_shippings.*')
                ->first();

//         echo '<pre>';
//         print_r($shipping_info_by_id);
//         exit();


$order_details_by_id= DB::table('tbl_order_details')
                ->where('tbl_order_details.order_id', $param)
                ->select('tbl_order_details.*')
                ->get();


//         echo '<pre>';
//         print_r($order_details_by_id);
//         exit();

       
        
         $createOrder = view('admin.order.viewSingleOrder')
                  ->with('customer_info_by_id',$customer_info_by_id)
                  ->with('shipping_info_by_id',$shipping_info_by_id)
                  ->with('order_details_by_id',$order_details_by_id);
         
           return view('admin.master')
                        ->with('mainContent', $createOrder);       
    }
    
     
    
     public function viewPDF($id)
    {
   
        return view('admin.order.myPDF');
                       
    }
    
    
    
    
     public function generatePDF($id)
    {
        // return $id;
         
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('admin.order.myPDF', $data);
  
        return $pdf->download('itsolutionstuff.pdf');
    }
    

    
    
    
}//OrderController
