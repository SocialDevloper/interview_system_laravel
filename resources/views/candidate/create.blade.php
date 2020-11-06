@extends('layout')
@section('content')
<div class="container">  
{{-- <form method="post" action="{{ route('candidate.store') }}"> --}}
<form action="@if(isset($candidate)) {{route('candidate.update', $candidate)}} @else {{route('candidate.store')}} @endif" method="post">  
  @csrf
  @if(isset($candidate))
    @method('PUT')
  @endif
  <div class="form-group">
    <label for="first_name">First Name *</label>
    <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name', @$candidate->first_name)}}">
    @error('first_name')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="Middle Name">Middle Name</label>
    <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{old('middle_name', @$candidate->middle_name)}}">
  </div>
  <div class="form-group">
    <label for="Last Name">Last Name *</label>
    <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name', @$candidate->last_name)}}">
    @error('last_name')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="Email">Email *</label>
    <input type="text" class="form-control" id="email" name="email" value="{{old('email', @$candidate->email)}}">
    @error('email')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-row">
    <div class="col">
    <label for="selectEducation">Select Education *</label>
    <select class="form-control" id="selectEducation" name="selectEducation">
      <option value="">Select Education</option>
      <option value="BCA" {{ old('selectEducation', @$candidate->selectEducation) == "BCA" ? 'selected' : '' }}>BCA</option>
      <option value="MCA" {{ old('selectEducation', @$candidate->selectEducation) == "MCA" ? 'selected' : '' }}>MCA</option>
      <option value="M.sc(IT)" {{ old('selectEducation', @$candidate->selectEducation) == "M.sc(IT)" ? 'selected' : '' }}>M.sc(IT)</option>
      <option value="B.sc(IT)" {{ old('selectEducation', @$candidate->selectEducation) == "B.sc(IT)" ? 'selected' : '' }}>B.sc(IT)</option>
      <option value="B.Tech" {{ old('selectEducation', @$candidate->selectEducation) == "B.Tech" ? 'selected' : '' }}>B.Tech</option>
    </select>
    @error('selectEducation')
    <span style="color: red">{{ $message }}</span>
    @endif
    </div>
    <div class="col">
    <label for="applyFor">Apply For *</label>
    <select class="form-control" id="applyFor" name="applyFor">
      <option value="">Apply For</option>
      <option value="PHP" {{ old('applyFor', @$candidate->applyFor) == "PHP" ? 'selected' : '' }}>PHP</option>
      <option value="Java" {{ old('applyFor', @$candidate->applyFor) == "Java" ? 'selected' : '' }}>Java</option>
      <option value="Android" {{ old('applyFor', @$candidate->applyFor) == "Android" ? 'selected' : '' }}>Android</option>
    </select>
    @error('applyFor')
    <span style="color: red">{{ $message }}</span>
    @endif
    </div>
  </div>
  <div class="form-group">
    <label for="Total Experience">Total Experience *</label>
    <input type="number" class="form-control" id="totalExperience" name="totalExperience" value="{{old('totalExperience', @$candidate->totalExperience)}}">
    @error('totalExperience')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-row">
    <div class="col">
      <label for="Current CTC">Current CTC *</label>
      <input type="text" class="form-control" name="currentCTC" value="{{old('currentCTC', @$candidate->currentCTC)}}">
      @error('currentCTC')
      <span style="color: red">{{ $message }}</span>
      @endif
    </div>
    <div class="col">
      <label for="Expected CTC">Expected CTC *</label>
      <input type="text" class="form-control" name="expectedCTC" value="{{old('expectedCTC', @$candidate->expectedCTC)}}">
      @error('expectedCTC')
      <span style="color: red">{{ $message }}</span>
      @endif
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label for="Notice Period">Notice Period *</label>
      <input type="text" class="form-control" name="noticePeriod" value="{{old('noticePeriod', @$candidate->noticePeriod)}}">
      @error('noticePeriod')
      <span style="color: red">{{ $message }}</span>
      @endif
    </div>
    <div class="col">
      <label for="Interview Date">Interview Date *</label>
      <input type="text" class="form-control date" name="interviewDate" value="{{old('interviewDate', @$candidate->interviewDate)}}" autocomplete="off">
      @error('interviewDate')
      <span style="color: red">{{ $message }}</span>
      @endif
    </div>
  </div>
  <div class="form-group">
    <label for="Select Status">Select Status *</label>
    <select class="form-control" id="selectStatus" name="selectStatus">
      <option value="">Select Status</option>
      <option value="Reviewed" {{ old('selectStatus', @$candidate->selectStatus) == "Reviewed" ? 'selected' : '' }}>Reviewed</option>
      <option value="Hired" {{ old('selectStatus', @$candidate->selectStatus) == "Hired" ? 'selected' : '' }}>Hired</option>
      <option value="Rejected" {{ old('selectStatus', @$candidate->selectStatus) == "Rejected" ? 'selected' : '' }}>Rejected</option>
    </select>
    @error('selectStatus')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group" id="reason" style="display: none;">
    <label for="Reason_to_leave_job">Reason to leave job *</label>
    <textarea class="form-control" id="reason_to_leave_job" name="reason_to_leave_job" rows="3">{{@$candidate->reason_to_leave_job}}</textarea>
    @error('reason_to_leave_job')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  
  <input type="submit" class="btn btn-primary" value="@if(isset($candidate)) {{ "Update" }}@else {{ "Submit" }} 
  @endif">
  <input type="button" class="btn btn-warning" onclick="history.back();" value="Cancel">
</form>
</div>
@endsection
@section('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $('.date').datepicker({  
      format: 'yyyy-mm-dd',
      autoclose: true
  });

  $(document).ready(function() {
      
    $("#selectStatus").change(function () {
        var checkedValue = this.value;
        
        if(checkedValue == 'Rejected')
        {
            $('#reason').show();
            if($('#reason_to_leave_job').val()=="")
            {
               
              $("#reason_to_leave_job").after("<div class='error' style='color:red;'>Please enter Reject Reason</div>");
            }
        }
        else
        {
          $('#reason').hide();
        }
    });
    /* Edit if status is rejected it will be display reason */
    @if(isset($candidate))
      if( $("#selectStatus").val() == "Rejected")
         $('#reason').show();
      else
         $('#reason').hide();   
    @endif
  });


</script>
@endsection