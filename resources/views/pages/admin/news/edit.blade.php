@extends('layouts.admin-layout')

@section('title', $title)
@section('admin-name', $user['adminName'])
@section($objectName, "active")

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
               <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
        	<div class="content-title">Edit {{ $title }}</div>  

        	<form action="{{ url('/admin/'.$objectName.'/editProcess') }}" method="post" class="disable-form" onsubmit="return confirm('save data')">
                {{ csrf_field() }}   
                <input type="hidden" name="id" value="{{ $obj->id }}">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="news title" maxlength="150" value="{{ $obj->title }}" required>
                </div>
                <div class="form-group">
                    <label>Summary</label>
                    <textarea name="summary" rows="4" class="form-control" placeholder="news summary" maxlength="200" required>{{ $obj->summary }}</textarea>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <input type="hidden" id="content" value="{{ $obj->body }}">
                    <textarea name="body" id="newsContent" class="form-control ckeditor" placeholder="news content" required></textarea>
                </div>
                <div class="form-group">
                    <label>Is Active</label>
                    &nbsp;
                    <input type="checkbox" name="isActive"
                    <?php
                    if($obj->isActive==1){
                        echo "checked";
                    }
                    ?>
                    >
                </div>
                <br/>
                <div class="form-group" align="right">
                    <a href="{{ url('/admin/'.$objectName) }}" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Back</a>
                    <button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-save"></i> Save</button>
                </div>
            </form> 
        </div>
    </div>
</div>
@endsection
