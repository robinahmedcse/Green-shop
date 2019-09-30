<?php

namespace App\Http\Controllers\admin\manufacture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;





class manufactureController extends Controller
{

          public function admin_login_auth_check() {

        session_start();
        $admin_id = session::get('admin_id');
        $admin_role = session::get('admin_role');

        if ($admin_id == NUll && $admin_role == NUll) {
            redirect::to('/wp/admin/master/login/form/showing')->send();
        }
    }

    public function createManufacture() {
        
        $this->admin_login_auth_check();
        
         $createManufacture= view('admin.manufacture.createManufacture');
                
        return view('admin.master')
                ->with('mainContent', $createManufacture);
    }
    
     
    public function saveManufacture(Request $request) {
 //return  $request->all();
      
        
            $this->validate($request, [
            'manufacture_name' => 'required',
            'manufacture_description' => 'required',
             'manufacture_publicationStatus'=> 'required'
        ]);
        
        
        $data=array();
        $data['manufacture_name'] = $request->manufacture_name;
        $data['manufacture_description'] = $request->manufacture_description;
        $data['manufacture_publicationStatus'] = $request->manufacture_publicationStatus;
   
       // echo $data['publication_status'];
        
        DB::table('tbl_manufactures')->insert($data);
        
         return redirect('/wp-admin/master/manufacture/manage')->with('manufacture_message','manufacture info Save Successfully'); 
        
    }
    
     
    public function manageManufacture() {
    
       $this->admin_login_auth_check();
        $all_manufactures=DB::table('tbl_manufactures')
               ->select('*')
              ->get();
        
         $manufactures= view('admin.manufacture..manageManufacture')
               ->with('all_manufactures',$all_manufactures);
       
       return view('admin.master')->with('mainContain',$manufactures);
        
         
    }
    
    
    
    
    
    
        public function unpublishedManufacture($id){    
         //return $id;
        $data=array();
        $data['manufacture_publicationStatus']=0;
        DB::table('tbl_manufactures')
                ->where('manufacture_id',$id)
                 ->update($data);
        
         session::put('message','publication status change successfully');
          return redirect::to('/wp-admin/master/manufacture/manage');
         
    }
    
      public function publishedManufacture($id){
          // return $id;
       $data['manufacture_publicationStatus']=1;
        DB::table('tbl_manufactures')
                ->where('manufacture_id',$id)
                 ->update($data);
        
          
           
        session::put('message','publication status change successfully');
           return redirect::to('/wp-admin/master/manufacture/manage');
          
    }
    
    
    
     
    public function editManufacture($id) {
        $manufacture_by_id=DB::table('tbl_manufactures')
                             ->where('manufacture_id',$id)
                              ->first();
        
        
//        echo '<pre>';
//       print_r($manufacture_by_id);
//       exit();

      
        
        $edit_manufacture= view('admin.manufacture.editManufacture')
               ->with('manufacture_by_id',$manufacture_by_id);
       
       return view('admin.master')->with('mainContain',$edit_manufacture);
         
    }
    
     
    public function updateManufacture(Request $request) {
  
             $manufacture_id = $request->manufacture_id;
        
        $this->validate($request, [
            'manufacture_name' => 'required',
            'manufacture_description' => 'required',
             'manufacture_publicationStatus'=> 'required'
        ]);
        
        
        $data=array();
        $data['manufacture_name'] = $request->manufacture_name;
        $data['manufacture_description'] = $request->manufacture_description;
        $data['manufacture_publicationStatus'] = $request->manufacture_publicationStatus;
   
       // echo $data['publication_status'];
        
        
      //  $data['updated_at']=date("y-m-d");
         
         DB::table('tbl_manufactures')
                 ->where('manufacture_id',$manufacture_id)
                 ->update($data);
        
         return redirect('/wp-admin/master/manufacture/manage')->with('manufacture_message','manufacture info update Successfully'); 
         
           
        
    }
    
     public function deleteManufacture($id) {
           return    $id;
            
        DB::table('tbl_manufactures')
                ->where('manufacture_id',$manufacture_id)
                ->delete();

         return redirect::to('admin/manage-manufacture')->with('manufacture_message','Manufacture Information delete Successfully');  
              
    }
    
    
    
    
    
}    //end of ManufactureController
