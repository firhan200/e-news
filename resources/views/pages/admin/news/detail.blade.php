@extends('layouts.admin-layout')

@section('title', $title)
@section('admin-name', $user['adminName'])
@section($objectName, "active")

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        	<div class="content-title">Detail {{ $title }}</div> 
        	
            <div class="content">
        		<div class="label">Title</div>
        		{{ $obj->title }}
        	</div>
        	<div class="content">
        		<div class="label">Summary</div>
        		{{ $obj->summary }}
        	</div>
        	<div class="content">
        		<div class="label">Author</div>
        		{{ $obj->author }}
        	</div>
        	<div class="content">
        		<div class="label">Content</div>
        		{!! $obj->body !!}
        	</div>
        	<div class="content">
        		<div class="label">Created At</div>
        		{{ $obj->created_at }}
        	</div>
        	<div class="content">
        		<div class="label">Updated At</div>
        		{{ $obj->updated_at }}
        	</div>
        </div>
    </div>
</div>
@endsection
