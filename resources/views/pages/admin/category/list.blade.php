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
        	<div class="content-title">{{ $contentTitle }}</div>  
        	<div class="row">
        		<div class="col-sm-4">
        			<form>
        				<div class="input-group">
        					<input type="hidden" name="isDeleted" value="{{ $isDeleted }}">
        					<input type="text" name="keyword" placeholder="search" class="form-control" value="{{ $keyword }}">
        				</div>
        			</form>
        		</div>
        		<div class="col-sm-8" align="right">
        			<a href="{{ url('/admin/'.$objectName.'/add') }}" class="btn btn-primary" data-toggle="tooltip" title="Add {{ $objectName }}"><i class="fa fa-plus"></i> Add {{ $objectName }}</a>
        			@if($isDeleted==0)
        				<a href="{{ url('/admin/'.$objectName.'?isDeleted=1') }}" class="btn btn-light" data-toggle="tooltip" title="Recycle bin"><i class="fa fa-trash"></i></a>
        			@else
        				<a href="{{ url('/admin/'.$objectName.'?isDeleted=0') }}" class="btn btn-success" data-toggle="tooltip" title="Active List"><i class="fa fa-star"></i></a>
        			@endif
        		</div>
        	</div>  
        	<br/>
        	<table class="table table-hover">
        		<thead>
        			<tr>
        				<th>No</th>
        				<th>Name</th>
        				<th>Hex Colour</th>
        				<th>Created On</th>
        				<th>Updated On</th>
        				@if($isDeleted==0)
        				<th>Is Active</th>
        				@endif
        				<th>Actions</th>
        			</tr>
        		</thead>
        		<tbody>
        			@if($objList->count() < 1)
        				<tr>
        					<td colspan="7" class="alert alert-light"><center>No Data</center></td>
        				</tr>
        			@else
	        			@foreach($objList as $obj)
	        			<tr>
	        				<td>{{ $counter }}</td>
                            <td>{{ $obj->name }}</td>
	        				<td>{{ $obj->hexColour }}</td>
	        				<td>{{ $obj->created_at }}</td>
	        				<td>{{ $obj->updated_at }}</td>
	        				@if($isDeleted==0)
		        				<td>
		        					@if($obj->isActive==1)
		        						<span class="badge badge-success">Active</span>
		        					@else
		        						<span class="badge badge-danger">No-active</span>
		        					@endif
		        				</td>
	        				@endif
	        				<td>
	        					@if($isDeleted==0)
		        					<div class="dropdown">
									  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <i class="fa fa-cogs"></i>
									  </button>
									  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									    <a class="dropdown-item" href="{{ url('/admin/'.$objectName.'/'.$obj->id) }}"><i class="fa fa-eye"></i> View</a>
									    <a class="dropdown-item" href="{{ url('/admin/'.$objectName.'/edit/'.$obj->id) }}"><i class="fa fa-cog"></i> Edit</a>
									    <a class="dropdown-item confirm-modal" data-content="delete {{ $obj->name }} ?" data-url="{{ url('/admin/'.$objectName.'/delete/'.$obj->id.'/1') }}" href="#!" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-remove"></i> Delete</a>
									  </div>
								@else
									<a href="#!" class="btn btn-sm btn-success confirm-modal" data-content="restore {{ $obj->name }} ?" data-url="{{ url('/admin/'.$objectName.'/delete/'.$obj->id.'/0') }}" data-toggle="modal" data-target="#confirmModal">Restore</a>
							  	@endif
								</div>
	        				</td>
	        			</tr>
	        			<?php $counter++; ?>
	        			@endforeach
        			@endif
        	</table> 
        	<div align="center">
        		{{ $objList->links() }} 
    		</div> 	     
        </div>
    </div>
</div>
@endsection
