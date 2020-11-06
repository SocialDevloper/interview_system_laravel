<!DOCTYPE html>
<html>
<head>
    <title>Laravel 6 Import Export Excel to database Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel 7 Import Excel to database - Candidate Insert
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
          </div>
        @endif    
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control" required="required">
                <br>
                <button class="btn btn-success">Import Candidate</button>
                <a class="btn btn-info" href="daterange">&#171; Back</a></div>
            </form>
        </div>
    </div>
</div>
   
</body>
</html>