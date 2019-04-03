@extends('layouts/app') 

@section('pageTitle', 'Yolooo')

@section('content')

<form action="/newTravel/saveNewTravel" method="post" id="myform">
    {{ csrf_field() }}

    <h1 class="mt-2">New Travel</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

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
                <label for="desc">Description</label>
                <textarea name="desc" id="desc" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-3 text-left">
            <div class="form-group">
                <label for="from">Pick start date</label>
                <input type="date" class="validDate" name="from" id="from" />
            </div>
        </div>

        <div class="col-3 text-left">
            <div class="form-group">
                <label for="to">Pick end date</label>
                <input type="date" class="validDate" name="to" id="to" />
            </div>
        </div>

        <script>
            var today = new Date(); 
            var dd = today.getDate(); 
            var mm = today.getMonth()+1; //January is 0! 
            var yyyy = today.getFullYear();

            if(dd<10){ 
                dd='0' +dd 
            } 

            if(mm<10){ 
                mm='0' +mm 
            } 

            today=yyyy+ '-'+mm+ '-'+dd; 
            document.getElementById("from").setAttribute("min", today);
            document.getElementById("to").setAttribute("min", today);
        </script>

        <script type="text/javascript" src="{{ URL::asset('js/checkDate.js') }}"></script>


        <div class="form-group col-2">
            <label for="max">Max num. of travellers</label>
            <select class="form-control" name="max" id="max">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
            </select>
        </div>

        <div class="col-6 mt-5">
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
</form>
@endsection