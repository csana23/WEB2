@extends('layouts/app')

@section('pageTitle', 'Yolooo')

@section('content')

    <form action="/newtravel" method="post">
        {{ csrf_field() }}

        <h1 class="mt-5">New Travel</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">New Travel
                </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="title">Destination</label>
                    <input type="text" name="title" id="title"
                           class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="lead">Intro</label>
                    <textarea name="lead" id="lead"
                              class="form-control"></textarea>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea name="content" id="content"
                              class="form-control"></textarea>
                </div>
            </div>

            <div class="col-12">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Mentés
                    </button>
                </div>
            </div>


        </div>
    </form>

@endsection
