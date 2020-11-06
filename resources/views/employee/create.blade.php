<!DOCTYPE html>
<html>
	<head>
		<title>Employee - Crud Laravel 7</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="card bg-light mt-3">
				<div class="card-header">
					Laravel 7 - Employee Insert
					@if ($message = Session::get('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ $message }}
					</div>
					@endif
				</div>
				<div class="card-body">
					<form action="@if(isset($employee)) {{route('employees.update', $employee)}} @else {{ route('employees.store') }} @endif" method="post" enctype="multipart/form-data">
						@csrf
						@if(isset($employee))
						    @method('PUT')
						@endif
						<div class="form-group">
							<label for="name">Name *</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name', @$employee->name) }}">
							@error('name')
							<span style="color: red">{{ $message }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="email">Email address *</label>
							<input type="email" class="form-control" name="email" id="email" value="{{ old('email', @$employee->email) }}">
							@error('email')
							<span style="color: red">{{ $message }}</span>
							@endif
						</div>
						{{-- check create/edit page --}}
						@if(Route::currentRouteName() == "employees.create")
						<div class="form-group">
							<label for="password">Password *</label>
							<input type="password" class="form-control" id="password" name="password">
							@error('password')
							<span style="color: red">{{ $message }}</span>
							@endif
						</div>
						@endif
						<div class="form-group">
							<label for="gender">Gender *</label>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male"  @if(old('gender', @$employee->gender) ==  'male') checked="checked" @endif>
								<label class="form-check-label" for="inlineRadio1">Male</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" @if(old('gender', @$employee->gender) ==  'female') checked="checked" @endif>
								<label class="form-check-label" for="inlineRadio2">Female</label>
							</div>
							@error('gender')
							<span style="color: red">{{ $message }}</span>
							@endif
						</div>
						<div class="row">
							<div class="col-6 col-md-4">
								<div class="form-group">
									<label for="age">Age *</label>
									<input type="number" class="form-control" name="age" id="age" value="{{ old('age', @$employee->age) }}">
									@error('age')
									<span style="color: red">{{ $message }}</span>
									@endif
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="form-group">
									<label for="salary">Salary</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">$</span>
										</div>
										<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="salary" value="{{ old('salary', @$employee->salary) }}">
										<div class="input-group-append">
											<span class="input-group-text">.00</span>
										</div>
									</div>
									@error('salary')
									<span style="color: red">{{ $message }}</span>
									@endif
								</div>
							</div>
							<div class="col-6 col-md-4">
								<div class="form-group">
									<label for="date">Birth Date *</label>
									<input type="text" class="form-control date" name="birth_date" id="birth_date" autocomplete="off" value="{{ old('birth_date', @$employee->birth_date) }}">
									@error('birth_date')
									<span style="color: red">{{ $message }}</span>
									@endif
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="hobby">Hobbies *: </label>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="hobby[]" value="playing" @if(in_array('playing', explode(",", @$employee->hobbies))) checked @endif @if(is_array(old('hobby')) && in_array('playing', old('hobby'))) checked @endif>
								<label class="form-check-label" for="hobby">Playing</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="hobby[]" value="travelling" @if(in_array('travelling', explode(",", @$employee->hobbies))) checked @endif @if(is_array(old('hobby')) && in_array('travelling', old('hobby'))) checked @endif>
								<label class="form-check-label" for="hobby">Travelling</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="hobby[]" value="photography" @if(in_array('photography', explode(",", @$employee->hobbies))) checked @endif @if(is_array(old('hobby')) && in_array('photography', old('hobby'))) checked @endif>
								<label class="form-check-label" for="hobby">Photography</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="hobby[]" value="learning" @if(in_array('learning', explode(",", @$employee->hobbies))) checked @endif @if(is_array(old('hobby')) && in_array('learning', old('hobby'))) checked @endif>
								<label class="form-check-label" for="hobby">Learning</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="hobby[]" value="drawing" @if(in_array('drawing', explode(",", @$employee->hobbies))) checked @endif @if(is_array(old('hobby')) && in_array('drawing', old('hobby'))) checked @endif>
								<label class="form-check-label" for="hobby">Drawing</label>
							</div>
							@error('hobby')
							<span style="color: red">{{ $message }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<textarea class="form-control" id="address" name="address" rows="3">{{ old('address', @$employee->address) }}</textarea>
						</div>
						<div class="form-group">
							<label for="Select Status">Select city *</label>
							<select class="form-control" id="city" name="city">
								<option value="">Select city</option>
								<option value="Ahmedabad" {{ old('city', @$employee->city) == "Ahmedabad" ? 'selected' : '' }}>Ahmedabad</option>
								<option value="Surat" {{ old('city', @$employee->city) == "Surat" ? 'selected' : '' }}>Surat</option>
								<option value="Rajkot" {{ old('city', @$employee->city) == "Rajkot" ? 'selected' : '' }}>Rajkot</option>
								<option value="Jamnagar" {{ old('city', @$employee->city) == "Jamnagar" ? 'selected' : '' }}>Jamnagar</option>
							</select>
							@error('city')
							<span style="color: red">{{ $message }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="image">Profile Image</label>
							<input type="file" class="form-control-file" id="image" name="image">
							@error('image')
							<span style="color: red">{{ $message }}</span>
							@endif
							@if(Route::currentRouteName() == "employees.edit")
								<img src="{{ asset('storage/'.$employee->image)}}" class="img-thumbnail" width="100" />
							@endif
						</div>
						@php
							if(Route::currentRouteName() == "employees.create")
								$button = "Submit";
							else
								$button = "Update";
						@endphp
						<button type="submit" class="btn btn-primary">@php
							echo $button
						@endphp</button>
						<button type="reset" class="btn btn-danger">Reset</button>
					</form>
				</div>
			</div>
			
		</div>
	</body>
	<script type="text/javascript">
	$('.date').datepicker({
	format: 'yyyy-mm-dd',
	autoclose: true,
	orientation: "bottom auto",
	endDate: '+0d',
	});
	</script>
</html>