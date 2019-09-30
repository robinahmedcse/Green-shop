<?php

namespace App\Http\Controllers\checkout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Cart;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;




class checkoutController extends Controller
{
    
     public function home(){
      //  return "checkout";
        
           $createCheckout = view('frontEnd.checkout.checkout');
        return view('frontEnd.master')->with('mainContent', $createCheckout);
        
    }// end index

  
 
        public function userCheckLogin(Request $request) {
   //  return  $request ->all();
         
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
          
//             echo '<pre>';
//             print_r($admin_info);
//             exit();
             
          if ($admin_info) {       
                
                 Session::put('user_customer_id', $admin_info->customer_id);
                 Session::put('user_customer_name', $admin_info->customer_name);
                 
                 return redirect('/checkout/shipping');
         
        } 
        
        else {
               return redirect('/checkout/products')->with('exception','Invalid Users'); 
        }
        
    }//end of adminCheckLogin
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 
     public function customer(Request $request){
      
 
//return $request->all();
       $this->validate($request, [

            'country' => 'required',
            'customer_first_name' => 'required',
            'customer_last_name'=> 'required',
            'address' => 'required',
            'city' => 'required',
            'thana'=> 'required',
            'post_office' => 'required',
            'district' => 'required',
            'email'=> 'required',
            'password' => 'required',
            'phone' => 'required', 
        ]);


 		 $password= $request->password;
        $encryp_pass = $this->customer_pass($password);

        // echo $encryp_pass;
        // exit();
      
  $fname = $request->customer_first_name;
  $lname = $request->customer_last_name; 

  $fullNmae = $fname.' '.$lname; 


  $data=array();
        $data['customer_name'] = $fullNmae;
        $data['email'] = $request->email ;
        $data['password'] =  $encryp_pass;
        $data['phone'] = $request->phone ;
        $data['address'] = $request->address;
   	$data['city'] = $request->city ;
        $data['thana'] = $request->thana;
    	$data['post_office'] = $request->post_office ;
        $data['district'] = $request->district;
    	$data['country'] = $request->country ;
         
   
   
        
        
        $customer_id = DB::table('tbl_customers')->insertGetId($data);
       // echo '----------------'.$customer_id ;

         Session::put('user_customer_id',$customer_id);
         Session::put('user_customer_name',$fname);
    
          return redirect('checkout/shipping');
      
         
        
    }// end index

           protected function customer_pass($password){
  	   $My_password=$password;
        
         $salted_1="a6dbs1jvm@#2$%yk7fbhs.ggfsddg!^&*)(}rgaV5Y9hwtb2sMHjGwR";
         $salted_2="!@ktfjdr-kj#sgcqfgfb%j^pjll+&kojk*j(g)hZzFoQXEVYCtIQCD7U2b8p56QS";
         $admin_pass_salted=$salted_2.$My_password.$salted_1;
         $hashed_password=hash('whirlpool',$admin_pass_salted);
         $dobul_hashed_password=hash('gost',$hashed_password);
         
          
         $iteration = 1000;
         $salt_admin = "d!nf#qv%krys^flhb&fj-sgweqafzgkdsa+(RoBin+AhMed+CSE)oghx+ijdkm-vlktmycq@mv.oKrdf*jgup>sij;vl<dkvp";
         $admin_password = hash_pbkdf2("haval256,5", $dobul_hashed_password, $salt_admin, $iteration, 199);

         return $admin_password;

        // echo $admin_password;
         //exit();

     }//end of customer_pass 

     public function shipping(){


     	// echo "admin_password";
      //   exit();
     	$customer_id=Session::get('user_customer_id');

     	  $customer_info=DB::table('tbl_customers')
     	  ->where('tbl_customers.customer_id', $customer_id)
               ->select('*')
              ->first();

            

        $createShipping = view('frontEnd.checkout.shipping')
                        ->with('customer_info',$customer_info);



        return view('frontEnd.master')->with('mainContent', $createShipping);
     }

          
     public function saveShipping(Request $request){
      
         //  return $request->all();
      
            $customer= $request->customer_check;
            
          if( $customer == 'same' ){
              
            $customer_id = $request->customer_id;
            $customer_info = DB::table('tbl_customers')
                    ->where('tbl_customers.customer_id', $customer_id)
                    ->select('*')
                    ->first();


            $this->save_exists_shipping($customer_info);
        }
          
          else{
                   $shipping_info = $request->all();
                   $this->save_new_shipping($shipping_info);  
          } //end of else
          
            return redirect('checkout/payment');
         
 
     }//end of saveShipping
           protected function save_exists_shipping($customer_info){
         
//          echo"<pre>";
//          print_r($customer_info);
//          exit();
//         
       $data=array();
            $data['customer_name'] = $customer_info->customer_name ;
            $data['phone'] = $customer_info->phone ;
            $data['address'] = $customer_info->address;
            $data['city'] = $customer_info->city ;
            $data['thana'] = $customer_info->thana;
            $data['post_office'] = $customer_info->post_office ;
            $data['district'] = $customer_info->district;
            $data['country'] = $customer_info->country ;
            
        
                $shipping_id = DB::table('tbl_shippings')->insertGetId($data);
     //  echo '----------------'.$shipping_id ;
       //exit();
   		Session::put('user_shipping_id',$shipping_id);
    
                
      
         
     }
     
            protected function save_new_shipping($shipping_info){
         
//         echo '<pre>';
//         print_r($shipping_info);
//         exit();
//         
                $fname = $shipping_info['customer_first_name'];
                $lname = $shipping_info['customer_last_name']; 
                $fullNmae = $fname.' '.$lname; 
                
//                echo $fullNmae;
//                exit();


       $data=array();
            $data['customer_name'] = $fullNmae;
            $data['phone'] = $shipping_info['phone'] ;
            $data['address'] = $shipping_info['address'];
            $data['city'] = $shipping_info['city'] ;
            $data['thana'] = $shipping_info['thana'];
            $data['post_office'] = $shipping_info['post_office'] ;
            $data['district'] = $shipping_info['district'];
            $data['country'] = $shipping_info['country'] ;
            
               $shipping_id = DB::table('tbl_shippings')->insertGetId($data);
       // echo '----------------'.$shipping_id ;
   		Session::put('user_shipping_id',$shipping_id);
    
              
         
     }//save_new_shipping
     

     
       public function showPaymentForm() {
           
           
        $createPayment = view('frontEnd.checkout.payment');
        return view('frontEnd.master')->with('mainContent', $createPayment);
        
        
    }
    
    
    
    public function saveOrderInfo(Request $request) {
          //  return $request->all();
           $paymentType = $request->payment;

         $customer_id = Session::get('user_customer_id');
         $shippingId = Session::get('user_shipping_id');
         $orderTotal= Cart::getTotal();
         
            $data_order=array();
            $data_order['customer_id'] = $customer_id;
            $data_order['shipping_id'] = $shippingId ;
            $data_order['order_total'] = $orderTotal;
           
            $order_id_save = DB::table('tbl_orders')->insertGetId($data_order);
            Session::put('order_id',$order_id_save);
            $orderId=Session::get('order_id');
            
//            echo '';
//            exit();
            
            $data_payment=array();
            $data_payment['order_id'] = $orderId;
            $data_payment['payment_type'] = $paymentType ;
            DB::table('tbl_payments')->insert($data_payment);
           
               
           
            $cartProducts=Cart::getContent();
            foreach($cartProducts as $cartProduct)
                {
                 $orderDetail=array();
                    $orderDetail['order_id']=$orderId;
                    $orderDetail['product_id']=$cartProduct->id;
                    $orderDetail['product_name']=$cartProduct->name;
                    $orderDetail['product_price']=$cartProduct->price;
                    $orderDetail['product_quantity']=$cartProduct->quantity;
                    
                    DB::table('tbl_order_details')->insert($orderDetail);
              }
              
              
             if ($paymentType == 'CashOnDelivery') {
          //  return 'Under construction CashOnDelivery. ';
             Cart::clear();
             
              Session::put('user_shipping_id', NULL);
              Session::put('order_id', NULL);
               
                
               
            return redirect('customer/dashboard')->with('pay_massage','Your Order Save successfully');
            
        }
         elseif ($paymentType == 'Paypal' ) {
                  Cart::clear();  
                  return redirect('customer/dashboard')->with('pay_massage','Your Order Save successfully');
        }
         elseif ($paymentType == 'Bkash' ) {
              Cart::clear();
            
              Session::put('user_shipping_id', NULL);
              Session::put('order_id', NULL);
              
              return redirect('customer/dashboard')->with('pay_massage','Your Order Save successfully');
        }
         elseif ($paymentType == 'Rocket' ) {
              Cart::clear(); 
            
              Session::put('user_shipping_id', NULL);
              Session::put('order_id', NULL);
              return redirect('customer/dashboard')->with('pay_massage','Your Order Save successfully');
        } 
        
        
        
        
    }//end of saveOrderInfo
    
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     


}// end of checkoutController
