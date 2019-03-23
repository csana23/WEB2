@extends('layouts/app') 

@section('pageTitle', 'Yolooo') 

@push('head')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@section('content')

<form action="/newtravel" method="post">
    {{ csrf_field() }}

    <h1 class="mt-2">New Travel</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Travel
            </li>
        </ol>
    </nav>

        <div class="col-lg-6 col-offset-3">
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" name="destination" id="destination" class="form-control">
            </div>
        </div>

        
        <div class="col-lg-6">
            <div class="form-group">
                <label for="intro">Intro</label>
                <input type="text" name="intro" id="intro" class="form-control">
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-12">
            <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />

            <script>
                $(function() {
                    $('input[name="daterange"]').daterangepicker({
                        opens: 'left'
                    }, function(start, end, label) {
                        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                    });
                });

            </script>
        </div>

        <div class="col-12">
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save
                    </button>
            </div>
        </div>
</form>
@endsection