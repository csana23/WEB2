@extends('layout/app') 
@section('content')
<h1 class="mt-5">{{ $travel->destination }}</h1>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $travel->destination }}
        </li>
    </ol>
</nav>

<div class="intro">
    {{ $travel->intro }}
</div>
@endsection