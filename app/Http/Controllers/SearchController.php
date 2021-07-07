<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;
use DB;
class SearchController extends Controller
{
    public function search(){
    	$user=User::select('role')->GroupBy('role')->get();
    	return view('search.search',compact('user'));
    }

    public function searchResult(Request $request){
    	$role=$request->role;
    	$user=User::with('UserInformation')->select('*')->where('role',$role)->get();

    	return view('search.searchResult',compact('user'));
    	
    }

    public function selectUser($id){

    	$user=User::with('UserInformation')->where('id',$id)->get();

        return response::json(array(
              'user' => $user,
             ));

    }


    public function selectedUser(Request $request){
       $data=array();
       $data['user_id']=$request->id;
       $data['username']=$request->username;
       $data['email']=$request->email;
       $data['address']=$request->address;
       $data['phone']=$request->phone;
       
         DB::table('selectedusers')->insert($data);

         $notification=array(
            'massage'=>'Selected User Inserted Successfully',
            'alert-type'=>'success'
            );
           return Redirect()->route('search')->with($notification);
       
    }

}
