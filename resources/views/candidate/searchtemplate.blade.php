        @php
          $no = 1;  
        @endphp
        @if(!$candidates->isEmpty())
        @foreach ($candidates as $candidate)
 
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $candidate->first_name. " ". $candidate->last_name }}</td>
          <td>{{ $candidate->selectEducation }}</td>
          <td>{{ $candidate->applyFor }}</td>
          <td>{{ $candidate->totalExperience }}</td>
          <td>{{ $candidate->currentCTC }}</td>
          <td>{{ $candidate->expectedCTC }}</td>
          <td>{{ $candidate->noticePeriod }}</td>
          <td>{{ $candidate->interviewDate }}</td>
          <td>{{ $candidate->selectStatus }}</td>
          <td style="white-space: nowrap;"><a class="btn btn-info btn-sm" href="{{route('candidate.edit',$candidate->id)}}">Edit</a> | <a id="trash-candidate-{{$candidate->id}}" class="btn btn-warning btn-sm" href="{{route('candidate.remove',$candidate->id)}}">Trash</a> | <a class="btn btn-danger btn-sm" href="javascript:;" onclick="confirmDelete('{{$candidate->id}}')">Delete</a>
        <form id="delete-candidate-{{$candidate->id}}" action="{{ route('candidate.destroy', $candidate->id) }}" method="POST" style="display: none;">
          
          @method('DELETE')
          @csrf
        </form>
      </td>
        @endforeach
        @else
        <tr>
          <td colspan="11" class="text-center">Not Records Found..</td>
        </tr>
        @endif