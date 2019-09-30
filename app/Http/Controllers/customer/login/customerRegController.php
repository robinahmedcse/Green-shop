<?php

namespace App\Http\Controllers\customer\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class customerRegController extends Controller
{
    
       public function showLoginForm() {
           $createRegForm = view('frontEnd.login.login');
        return view('frontEnd.master')->with('mainContent', $createRegForm);
 
    }
    
    
    
}// end of customerRegController
