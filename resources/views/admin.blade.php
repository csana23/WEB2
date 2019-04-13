@extends('layouts/adminLayout') 

@section('pageTitle', 'Details of travel') 

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif @if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

    <div class="jumbotron mt-2">
        <h1>Admin page</h1>
        <a class="btn btn-primary btn-lg btn-block" href="{{ url('admin/newTravel') }}" role="button"> Create New Travel </a>
    </div>
    
    <div>
        <a href="/admin/logout" class="btn btn-primary btn-lg ml-5">Logout</a>
    </div>

@endsection

    
    
    
