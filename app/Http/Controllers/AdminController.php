<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\User;
use Yajra\DataTables\DataTables;

use App\userinformation;

use DB;

class AdminController extends Controller
{
     public function index(){

            $user=User::select('*')->get();
     
    		return view('admin.home',compact('user'));
    }




    public function store(Request $request){

    	$data=array();
    		$id=$request->user_id;
		    $data['id'] = $request->user_id;
		    $data['role'] = $request->role;

	    $information=array();

	    $information['user_id']=$request->user_id;
	    $information['phone']=$request->phone;
	    $information['address']=$request->address;


	    	DB::table('users')->where('id',$id)->update($data);

	    	 DB::table('userinformations')->insert($information);

	    	  $notification=array(
            'massage'=>'User Information Updated successfully',
            'alert-type'=>'success'
      			);
           return Redirect()->back()->with($notification);
   
    }


    public function editUserInformation($id){


    		$data=User::with('UserInformation')->where('id',$id)->first();

    		return view('Admin.edituser',compact('data'));
    }


   



 public function  updateUserInformation(Request $request, $id){

    	$data=array();
    		
		    $data['id'] = $id;
		    $data['email']=$request->email;
		    $data['username']=$request->username;
		    $data['role'] = $request->role;


	    $information=array();

		    $information['user_id']=$id;
		    $information['phone']=$request->phone;
		    $information['address']=$request->address;

	    	DB::table('users')->where('id',$id)->update($data);

	    	DB::table('userinformations')->where('user_id',$id)->update($information);

      $notification=array(
            'massage'=>'User Information Updated successfully',
            'alert-type'=>'success'
      			);
   return Redirect()->route('user')->with($notification); 
 
 }


 public function deleteUserInformation($id){

    $user=User::find($id);
    $user->delete();
    return response()->json(['success'=>'Record has been deleted']);
 }







}
