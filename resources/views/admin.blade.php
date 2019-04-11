@extends('layouts.app') 

@section('pageTitle', 'Home') 

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
@endsection