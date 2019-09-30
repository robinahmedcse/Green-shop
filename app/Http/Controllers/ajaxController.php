<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;


class ajaxController extends Controller
{
  
    
      public function email($email_address) {
        echo'-------------'.$email_address;
        exit();
    }
    
    
    
}
