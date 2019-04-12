@extends('layouts.app') 

@section('pageTitle', 'Admin boi') 

@section('content') 
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1>YOOOO BOI ITS ADMIN BITCHES</h1>
    <a class="btn btn-primary btn-lg btn-block" href="{{ url('admin/newTravel') }}" role="button"> Create New Travel </a>
@endsection