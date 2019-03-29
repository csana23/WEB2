@extends('layouts.app')

@section('pageTitle', 'Home')

@section('content')
    <div class="jumbotron mt-2">
    <h1 class="display-4">Travels</h1>
    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="{{ route('newTravel') }}" role="button"> Create New Travel </a>
    </div>
    
    <div class="row">
        @foreach($travels as $travel)
        <div class="col-lg-4 col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $travel->destination }}</h5>
                    <p class="card-text">{{ $travel->intro}}</p>
                    <a href="/travels/{{ $travel->destination }}" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

