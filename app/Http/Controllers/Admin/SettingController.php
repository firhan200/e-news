<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use Session;

class SettingController extends Controller
{
    protected $model;
    protected $data;

    public function __construct(){
        $this->middleware('adminAuth');

        $this->model = new \App\Models\Setting;
        $this->data['title'] = "Setting";
        $this->data['paginate'] = 10;
        /* folder in views & routes name */
        $this->data['objectName'] = 'setting';
    }

    public function list(Request $request){
        $this->data['user'] = $this->__getUserInfo();
        $this->data['counter'] = 1;
        $this->data['keyword'] = "";
        $this->data['isDeleted'] = 0;
        $this->data['contentTitle'] = $this->data['title'];

        //set counter
        if($request->query('page')!=null){
            $this->data['counter'] = ($request->query('page')*$this->data['paginate'])-($this->data['paginate'] - 1);
        }   

        //get & set query string
        if($request->query('keyword')!=null){
            $this->data['keyword'] = $request->query('keyword');
        }
        if($request->query('isDeleted')!=null){     
            $this->data['isDeleted'] = $request->query('isDeleted');
            if($this->data['isDeleted']==1){
                $this->data['contentTitle'] = "Deleted ".$this->data['title'];
            }
        }
        $querystringArray = ['keyword' => $this->data['keyword'], 'idDeleted' => $this->data['isDeleted']];
        
        //procedure query
        $this->data['objList'] = $this->model->
            where('isDeleted', $this->data['isDeleted'])->
            where('name', 'LIKE', "%".$this->data['keyword']."%")->
            orderBy('created_at', 'desc')->
            paginate($this->data['paginate']);

        //append query string to laravel pagination
        $this->data['objList']->appends($querystringArray);
        return view('pages/admin/'.$this->data['objectName'].'/list', $this->data);
    }

    public function add(){
        $this->data['user'] = $this->__getUserInfo();
        return view('pages/admin/'.$this->data['objectName'].'/add', $this->data);
    }

    public function addProcess(Request $request){
        //process data
        $isActive = $request->input('isActive')=="on" ? 1 : 0;

        //insert data to model
        $this->model->name = $request->input('name');
        $this->model->value = $request->input('value');
        $this->model->isActive = $isActive;
        $this->model->isDeleted = 0;

        //save model
        $this->model->save();

        //trigger flash message
        Session::flash('message', "Successfully insert ".$this->model->name);

        return Redirect('/admin/'.$this->data['objectName'].'/edit/'.$this->model->id);
    }

    public function detail($id){
        $this->data['user'] = $this->__getUserInfo();

        //validating data 
        $this->data['obj'] = $this->model->where('id', $id)->first();
        if($this->data['obj']==null){
            //not found
            return Redirect('/admin/'.$this->data['objectName']);
        }

        return view('pages/admin/'.$this->data['objectName'].'/detail', $this->data);
    }

    public function edit($id){
        $this->data['user'] = $this->__getUserInfo();

        //validating data
        $this->data['obj'] = $this->model->where('id', $id)->first();
        if($this->data['obj']==null){
            //not found
            return Redirect('/admin/'.$this->data['objectName']);
        }

        return view('pages/admin/'.$this->data['objectName'].'/edit', $this->data);
    }

    public function editProcess(Request $request){
        //validating data
        $id = $request->input('id');
        $obj = $this->model->where('id', $id)->first();
        if($obj==null){
            //not found
            return Redirect('/admin/'.$this->data['objectName']);
        }

        $isActive = $request->input('isActive')=="on" ? 1 : 0;
        //insert data to model
        $obj->name = $request->input('name');
        $obj->value = $request->input('value');
        $obj->isActive = $isActive;

        //save model
        $obj->save();

        //trigget flash message
        Session::flash('message', "Successfully edit ".$obj->name);

        return Redirect('/admin/'.$this->data['objectName'].'/edit/'.$id);
    }

    public function deleteProcess($id, $isDeleted){
        //validating data
        $obj = $this->model->where('id', $id)->first();
        if($obj==null){
            //not found
            return Redirect('/admin/'.$this->data['objectName']);
        }

        //insert data to model
        $obj->isDeleted = $isDeleted;

        //save model
        $obj->save();

        //trigger flash message
        if($isDeleted==1){
            $message = "Successfully delete ".$obj->title;
        }else{
            $message = "Successfully restore ".$obj->title;
        }
        Session::flash('message', $message);

        return Redirect::back();
    }
}
