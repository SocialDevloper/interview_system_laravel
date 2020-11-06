<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <h3 class="text-center">Candidate Details</h3>
    <table class="table table-bordered">
    <thead>
      <tr class="table-danger">
        <td>Candidate Name</td>
        <td>Apply For</td>
        <td>Status</td>
        <td>Interview Date</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($candidate as $data)
        <tr>
            <td>{{ $data->first_name . " ". $data->last_name  }}</td>
            <td>{{ $data->applyFor }}</td>
            <td>{{ $data->selectStatus }}</td>
            <td>{{ $data->interviewDate }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>