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
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="news title" maxlength="150" required>
                </div>
                <div class="form-group">
                    <label>Summary</label>
                    <textarea name="summary" rows="4" class="form-control" placeholder="news summary" maxlength="200" required></textarea>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="body" class="form-control ckeditor" placeholder="news content" required></textarea>
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
