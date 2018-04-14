<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class AuthController extends Controller
{
	protected $data;
	private $admin;

    public function __construct(){
    	$this->admin = new \App\Models\Admin;

    	$this->middleware('authorize');
    }

    public function login(){
    	return view('login');
    }

    public function loginProcess(Request $request){
    	$email = $request->input('email');
    	$password = sha1($request->input('password'));

    	//check login
    	$adminObj = $this->admin::where('email' , $email)->where('password', $password)->first();
    	if($adminObj!=null){
    		//set session
            Session::put('adminId', $adminObj->id);
    		Session::put('adminName', $adminObj->name);

    		return Redirect('admin/home');
    	}else{
    		$this->data['feedback'] = "Email / password incorrect!";
    	}

    	return view('login', $this->data);
    }
}
