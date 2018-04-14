@extends('layouts.admin-layout')

@section('title', $title)
@section('admin-name', $user['adminName'])
@section($objectName, "active")

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        	<div class="content-title">Add {{ $title }}</div>  

        	<form action="{{ url('/admin/'.$objectName.'/addProcess') }}" method="post" class="disable-form">
                {{ csrf_field() }}   
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="category name" maxlength="150" required>
                </div>
                <div class="form-group">
                    <label>Hex Colour Code</label>
                    <input type="text" name="hexColour" class="form-control" placeholder="hex colour" maxlength="150" required>
                </div>
                <div class="form-group">
                    <label>Is Active</label>
                    &nbsp;
                    <input type="checkbox" name="isActive" checked>
                </div>
                <br/>
                <div class="form-group" align="right">
                    <a href="{{ url('/admin/news') }}" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Back</a>
                    <button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-send"></i> Post</button>
                </div>
            </form> 
        </div>
    </div>
</div>
@endsection
