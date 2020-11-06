<!DOCTYPE html>
<html>
	<head>
		<title>Employee - Crud Laravel 8</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<h3 class="text-center">Emplpoyee Details</h3>
			<div align="right">
			 <a href="{{ route('employees.create') }}" class="btn btn-success">Add New</a>
			</div>
			<br />
			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ $message }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif

			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Avtar</th>
							<th scope="col">Employee Name</th>
							<th scope="col">Email</th>
							<th scope="col">Gender</th>
							<th scope="col">Salary</th>
							<th scope="col">Hobbies</th>
							<th scope="col">City</th>
							<th scope="col">Birth Date</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody id="tableData">
						@php
							$no = 1;
						@endphp
						@foreach ($employees as $employee)
						
						<tr>
							<td>{{ $no++ }}</td>
							<td><img src="{{ asset('storage/'.$employee->image)}}" alt="Image" width="50" height="50" /></td>
							<td>{{ $employee->name }}</td>
							<td>{{ $employee->email }}</td>
							<td>{{ $employee->gender }}</td>
							<td>{{ $employee->salary ?: '-' }}</td>
							<td>{{ $employee->hobbies }}</td>
							<td>{{ $employee->city }}</td>
							<td>{{ date("d-m-Y", strtotime($employee->birth_date)) }}</td>
						<td style="white-space: nowrap;"><a class="btn btn-info btn-sm" href="{{route('employees.edit',$employee->id)}}">Edit</a> | <a class="btn btn-danger btn-sm" href="javascript:;" onclick="confirmDelete('{{$employee->id}}')">Delete</a>
						<form id="delete-employee-{{$employee->id}}" action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: none;">
							
							@method('DELETE')
							@csrf
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</body>
<script type="text/javascript">
	function confirmDelete(id){
        let choice = confirm("Are You sure, You want to Delete this record ?")
        if(choice){
          document.getElementById('delete-employee-'+id).submit();
        }
    }
</script>
</html>