@extends('layouts.admin-layout')

@section('title', $title)
@section('admin-name', $user['adminName'])
@section($objectName, "active")

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>{{ $obj->title }}</h3>
            <b>Summary</b>
            <p align="justify" class="news-summary">{{ $obj->summary }}</p>
            {!! $obj->body !!}
        </div>
    </div>
</div>
@endsection
