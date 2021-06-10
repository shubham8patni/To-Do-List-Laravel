<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Storage;

class UserController extends Controller
{

	public function uploadAvatar(Request $request){
		
		if($request->hasfile('image')){
            $oldimg = auth()->user()->avatar;
            User::deleteOldImage($oldimg);
			User::uploadAvatar($request->image);
			return redirect()->back()->with('message','Image successfully uploaded.'); // success message
		}
		return redirect()->back()->with('error','Image not uploaded'); // error message
			
	}

    public function index(){

    	/*$data = [
			'name'      => 'Shubham Patni 5',
			'email'     => 'shubhampatni92@gmail.com',
			'password'  => 'shubham88',
		];

		User::create($data);*/

    	/*$user = User::all();
    	return $user;*/

    	//User::where('id', 3)->delete();


    	/*$user = new User();
    	$user->name = "Shubham Patni 2";
    	$user->email = "shubhampatni89@gmail.com";
    	$user->password = bcrypt("shubham88");
    	$user->save();*/
    	
    	/*DB::insert('insert into users (name, email, password) values (?, ?, ?)', [
    		'Shubham', 'shubhampatni88@gmail.com', 'shubham88'
    	]);*/

    	/*$users = DB::select('Select * from users');
    	return $users*/

    	//DB::update('Update users set name = "Shubham Patni" where id  = 1');

    	return view('welcome');    
    }


}
