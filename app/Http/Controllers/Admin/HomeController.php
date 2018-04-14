<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class HomeController extends Controller
{
	protected $data;

    public function __construct(){
    	$this->middleware('adminAuth');

    	$this->data['title'] = "dashboard";

    }

    public function dashboard(){
    	$this->data['user'] = $this->__getUserInfo();
    	return view('pages/admin/dashboard', $this->data);
    }

    public function __logout(Request $request){
    	$request->session()->forget('adminId');
    	$request->session()->forget('adminName');

    	return Redirect('/admin');
    }
}
