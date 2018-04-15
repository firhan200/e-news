<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __getUserInfo(){
    	$user = array(
    		'adminName'=>Session::get('adminName'),
    		'adminId'=>Session::get('adminId')
    	);
    	return $user;
    }

    public function __getSettingValueByName($settingName){
    	$settings = new \App\Models\Setting;
    	$setting = $settings::where('name', $settingName)->first();
    	if($setting!=null){
    		//found
    		return $setting->value;
    	}else{
    		//not found
    		return null;
    	}
    }
}
