<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin page</title>
</head>
<body>

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
    
</body>
</html>

    
    
    
