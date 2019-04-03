@extends('layouts/app') 
@section('pageTitle', 'Details of travel')

@section('content')
<h1 class="mt-2 ml-3">{{ $travel->destination }}</h1>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $travel->destination }}
        </li>
    </ol>
</nav>

<div class="jumbotron mt-5 ml-5 col-6">
    <h2> {{ $travel->intro }} </h2>
    <hr class="my-4">
    <h3> {{ $travel->desc }} </h3>
    <hr class="my-4">
    <h4 style="color: gray;">Date of travel: {{ $travel->from }} / {{ $travel->to }} </h4>

    <div class="text-right">
        <!-- $travel->max -->
        <h4> Capacity: {{ $current }} / {{ $travel->max }} </h4>
    </div>

    <div class="text-right mt-5">
        <a href="/travels/{{ $travel->destination }}/joinTravel" class="btn btn-primary">Join Travel</a>
    </div>
</div>

@endsection