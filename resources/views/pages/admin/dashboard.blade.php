@extends('layouts.admin-layout')

@section('title', $title)
@section('admin-name', $user['adminName'])

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content-title">Dashboard</div>  
        </div>
    </div>
</div>
@endsection
