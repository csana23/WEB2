@extends('layouts/app') 

@section('pageTitle', 'Yolooo')

@section('content')

<form action="/newtravel" method="post">
    {{ csrf_field() }}

    <h1 class="mt-2">New Travel</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Travel
            </li>
        </ol>
    </nav>

        <div class="col-lg-6">
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

        <div class="col-3 text-left">
            <div class="form-group">
                <label for="daterange">Pick date range</label>
                <input type="text" name="daterange" id='boi' value="03/23/2019 - 03/24/2019" class="form-control" />
                <script>
                    $(function() { $('input[name="daterange"]').daterangepicker({ opens: 'right' }, function(start, end, label) { 
                        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                        var from = start.format('YYYY-MM-DD');
                        var to = end.format('YYYY-MM-DD');
                        }); 
                    });
                </script>
            </div>
        </div>

        <div class="col-6 mt-5">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Save
                    </button>
            </div>
        </div>
</form>
@endsection