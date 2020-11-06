@extends('layout')
@section('navbar')
<ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @php 
      $locale = session()->get('locale'); 
      @endphp
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              @switch($locale)
                  @case('fr')
                  <img src="{{asset('img/fr.png')}}" width="30px" height="20x"> French
                  @break
                  @case('ge')
                  <img src="{{asset('img/ge.png')}}" width="30px" height="20x"> German
                  @break
                  @case('es')
                  <img src="{{asset('img/es.png')}}" width="30px" height="20x"> Spanish
                  @break
                  @case('in')
                  <img src="{{asset('img/in.png')}}" width="30px" height="20x"> Hindi
                  @break
                  @case('pk')
                  <img src="{{asset('img/pk.png')}}" width="30px" height="20x"> Urdu
                  @break
                  @default
                  <img src="{{asset('img/us.png')}}" width="30px" height="20x"> English
              @endswitch
              <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="lang/en"><img src="{{asset('img/us.png')}}" width="30px" height="20x"> English</a>
              <a class="dropdown-item" href="lang/fr"><img src="{{asset('img/fr.png')}}" width="30px" height="20x"> French</a>
              <a class="dropdown-item" href="lang/ge"><img src="{{asset('img/ge.png')}}" width="30px" height="20x"> German</a>
              <a class="dropdown-item" href="lang/es"><img src="{{asset('img/es.png')}}" width="30px" height="20x"> Spanish</a>
              <a class="dropdown-item" href="lang/in"><img src="{{asset('img/in.png')}}" width="30px" height="20x"> Hindi</a>
              <a class="dropdown-item" href="lang/pk"><img src="{{asset('img/pk.png')}}" width="30px" height="20x"> Urdu</a>
          </div>
      </li>
  </ul>
<nav class="my-2 my-md-0 mr-md-3">
    <a class="dropdown-item p-2 text-dark" href="{{ route('candidate.create') }}">{{ __('app.newCandidate')}}</a>
    <a class="dropdown-item" href="{{route('candidate.index')}}">{{ __('app.allCandidate')}}</a>
    <a class="dropdown-item" href="{{route('candidate.trash')}}">{{ __('app.trashedCandidate')}}</a>
  </nav> 
  <a class="btn btn-outline-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
  document.getElementById('logout-form').submit();">{{ __('app.signout') }}</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
  </form>
@endsection
@section('content')
<h3 class="text-center">{{ __('app.displayTitle')}}</h3>
<div class="container">
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<form action="" method="">  
<div class="row">
<div class="col-md-4">
<select class="form-control" id="applyFor" name="applyFor">
      <option value="">Apply For</option>
      <option value="PHP" {{ old('applyFor') == "PHP" ? 'selected' : '' }}>PHP</option>
      <option value="Java" {{ old('applyFor') == "Java" ? 'selected' : '' }}>Java</option>
      <option value="Android" {{ old('applyFor') == "Android" ? 'selected' : '' }}>Android</option>
    </select>
</div>
<div class="col-md-4">
<select class="form-control" id="selectStatus" name="selectStatus">
      <option value="">Select Status</option>
      <option value="Reviewed" {{ old('selectStatus') == "Reviewed" ? 'selected' : '' }}>Reviewed</option>
      <option value="Hired" {{ old('selectStatus') == "Hired" ? 'selected' : '' }}>Hired</option>
      <option value="Rejected" {{ old('selectStatus') == "Rejected" ? 'selected' : '' }}>Rejected</option>
    </select> 
</div>
<div class="col-md-4">
  <input type="submit" name="submit" class="btn btn-success Search" value="{{ __('app.searchBtn')}}">
  <input type="reset" class="btn btn-danger" value="{{ __('app.resetBtn')}}">
</div>
</div>
</form>   
<div class="table-responsive py-5"> 
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Candidate Name</th>
          <th scope="col">Education</th>
          <th scope="col">ApplyFor</th>
          <th scope="col">Total Experience</th>
          <th scope="col">Current ctc</th>
          <th scope="col">Expected ctc</th>
          <th scope="col">Notice Period</th>
          <th scope="col">Interview Date</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tableData">
        @foreach ($candidates as $candidate)
 
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $candidate->first_name. " ". $candidate->last_name }}</td>
          <td>{{ $candidate->selectEducation }}</td>
          <td>{{ $candidate->applyFor }}</td>
          <td>{{ $candidate->totalExperience }}</td>
          <td>{{ $candidate->currentCTC }}</td>
          <td>{{ $candidate->expectedCTC }}</td>
          <td>{{ $candidate->noticePeriod }}</td>
          <td>{{ date("d-m-Y", strtotime($candidate->interviewDate)) }}</td>
          <td>{{ $candidate->selectStatus }}</td>
          @if($candidate->trashed())
          <td><a class="btn btn-info btn-sm" href="{{route('candidate.recover',$candidate->id)}}">Restore</a>
            </td>
          @else
          <td style="white-space: nowrap;"><a class="btn btn-info btn-sm" href="{{route('candidate.edit',$candidate->id)}}">Edit</a> | <a id="trash-candidate-{{$candidate->id}}" class="btn btn-warning btn-sm" href="{{route('candidate.remove',$candidate->id)}}">Trash</a> | <a class="btn btn-danger btn-sm" href="javascript:;" onclick="confirmDelete('{{$candidate->id}}')">Delete</a>
        <form id="delete-candidate-{{$candidate->id}}" action="{{ route('candidate.destroy', $candidate->id) }}" method="POST" style="display: none;">
          
          @method('DELETE')
          @csrf
        </form>
      </td>
      @endif
        </tr>
        @endforeach
      </tbody>
    </table>
    {!! $candidates->links() !!}
    </div>
</div>
@endsection
@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script type="text/javascript">
function confirmDelete(id){
let choice = confirm("Are You sure, You want to Delete this record ?")
if(choice){
document.getElementById('delete-candidate-'+id).submit();
}
}

$(document).ready(function(){

    $(".Search").click(function(e){

      e.preventDefault();
      var applyFor = $("#applyFor").val();
      var status = $("#selectStatus").val();
      var _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
         url: '{{ route('candidate.fetchAll') }}',
         type: 'POST',
         data:{applyFor:applyFor, status:status, _token: _token},
         success: function(response){
          $('#tableData').html(response);
         }
       });  

    });
  });

</script>
@endsection