<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{

	//all users view function

	function UsersIndex(){

    //$UsersData = json_decode(UsersTableModel::orderBy('id','desc')->take(500)->get());

      $UsersData = json_decode(User::all());
      
        return view('Users',['UsersData'=>$UsersData]);
    }

	//edit user profile view function

    function EditProfile($id){
    	$editUserData = User::findorfail($id);
		return view('EditUserProfile', compact('editUserData'));
    }

    //update user profile function

    function UpdateUserprofile(Request $request,$id){
    	//dd($request->all());
    	$viewUserData = User::findorfail($id);
    	$userEmail = $viewUserData->email;
    	$userPass = $viewUserData->password;
    	$reqUserEmail = $request->email;
    	$reqUserPass = $request->password;
    	//dd($reqUserPass);
    	if($reqUserPass == null){
			$reqUserPass = Auth::user()->password;
    	}
    	//dd($reqUserPass);
    	if($userEmail == $reqUserEmail ){
    		//dd($reqUserPass);
    		$data = $request->validate([
    		'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dasignation' => ['required', 'string', 'max:255'],
            
			]);
 			if($userPass == $reqUserPass){
    			$data = $request->validate([
    			'name' => ['required', 'string', 'max:255'],
            	'email' => ['required', 'string', 'email', 'max:255'],
            	'dasignation' => ['required', 'string', 'max:255'],
            	
				]);
				//dd($data);
				if($data){
				User::where('id',$id)->update($data);

				return redirect()->back()->with('Success', 'User data has updated successfully');
				}
				else{
					return redirect()->back()->with('Failed', 'error');
				}
    		}
    		
    		else{
    			$data = $request->validate([
    			'name' => ['required', 'string', 'max:255'],
            	'email' => ['required', 'string', 'email', 'max:255'],
            	'dasignation' => ['required', 'string', 'max:255'],
            	'password' => ['required', 'string', 'min:8', 'confirmed'],
				]);
				//dd($data);
				//$viewUserData->password = Hash::make($data['password']);
				//dd($viewUserData->password);
				if($data){
					//dd($data);
					//$viewUserData->password = Hash::make($data['password']);
					//dd($viewUserData->password);
					//dd($data);
					User::where('id',$id)->update([
						'name' => $data['name'],
			            'email' => $data['email'],
			            'dasignation' => $data['dasignation'],
			            'password' => Hash::make($data['password']),
					]);
					return redirect()->back()->with('Success', 'User data updated successfully');
				}
				else{
					return redirect()->back()->with('Failed', 'error');
				}
    		}
    	}
    	else{

    		if($userPass == $reqUserPass){
    			$data = $request->validate([
    			'name' => ['required', 'string', 'max:255'],
            	'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            	'dasignation' => ['required', 'string', 'max:255'],
 
				]);
				//dd($data);
				if($data){
				User::where('id',$id)->update($data);
				return redirect()->back()->with('Success', 'User data updated successfully');
				}
				else{
					return redirect()->back()->with('Failed', 'error');
				}
    		}
    		
    		else{
    			$data = $request->validate([
    			'name' => ['required', 'string', 'max:255'],
            	'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            	'dasignation' => ['required', 'string', 'max:255'],
            	'password' => ['required', 'string', 'min:8', 'confirmed'],
				]);
				//dd($data);
				if($data){
				User::where('id',$id)->update([
						'name' => $data['name'],
			            'email' => $data['email'],
			            'dasignation' => $data['dasignation'],
			            'password' => Hash::make($data['password']),
					]);

				return redirect()->back()->with('Success', 'User data updated successfully');
				}
				else{
					return redirect()->back()->with('Failed', 'error');
				}
    		}
    	}
    }
}
