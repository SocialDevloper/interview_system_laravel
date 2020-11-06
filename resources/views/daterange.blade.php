<!DOCTYPE html>
<html>
 <head>
  <title>Date Range Fiter Data in Laravel using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Date Range Fiter Data in Laravel using Ajax</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-5">Sample Data - Total Records - <b><span id="total_records"></span></b>
        <a class="btn btn-info" href="importExportView">Import Candidate Data Excel File</a></div>
      <div class="col-md-5">
       <div class="input-group input-daterange">
           <input type="text" name="from_date" id="from_date" readonly class="form-control" />
           <div class="input-group-addon">to</div>
           <input type="text"  name="to_date" id="to_date" readonly class="form-control" />
       </div>
      </div>
      <div class="col-md-2">
       <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
       <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th width="40%">Candidate Name</th>
         <th width="30%">Apply For</th>
         <th width="15%">Status</th>
         <th width="15%">Interview Date</th>
        </tr>
       </thead>
       <tbody>
       
       </tbody>
      </table>
      {{ csrf_field() }}
       <a class="btn btn-success btn-sm" href="javascript:;" onclick="confirmExport('export-data')">Export to Excel</a>
       <form id="export-data" action="{{ route('export') }}" method="POST" style="display: none;">
          <input type="hidden" name="startDate" id="startDate-export-data">
          <input type="hidden" name="endDate" id="endDate-export-data">
          @csrf
        </form>
        <a class="btn btn-primary btn-sm" href="javascript:;" onclick="confirmExport('export-pdf-data')">Export to PDF</a>
        <form id="export-pdf-data" action="{{ route('makePdf') }}" method="POST" style="display: none;">
          <input type="hidden" name="startDate" id="startDate-export-pdf-data">
          <input type="hidden" name="endDate" id="endDate-export-pdf-data">
          @csrf
        </form>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 var date = new Date();

 $('.input-daterange').datepicker({
  todayBtn: 'linked',
  format: 'yyyy-mm-dd',
  autoclose: true
 });

 var _token = $('input[name="_token"]').val();

 fetch_data();

 function fetch_data(from_date = '', to_date = '')
 {
  $.ajax({
   url:"{{ route('daterange.fetch_data') }}",
   method:"POST",
   data:{from_date:from_date, to_date:to_date, _token:_token},
   dataType:"json",
   success:function(data)
   {
    var output = '';
    $('#total_records').text(data.length);
    for(var count = 0; count < data.length; count++)
    {
     output += '<tr>';
     output += '<td>' + data[count].first_name+ " "+ data[count].last_name + '</td>';
     output += '<td>' + data[count].applyFor + '</td>';
     output += '<td>' + data[count].selectStatus + '</td>';
     output += '<td>' + data[count].interviewDate + '</td></tr>';
    }
    $('tbody').html(output);
   }
  })
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   fetch_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  fetch_data();
 });


});
function confirmExport($formName){

  // bind start and end date in export-data form hidden value
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();

  $('#startDate-'+$formName).val(from_date);
  $('#endDate-'+$formName).val(to_date);

  document.getElementById($formName).submit();

}
</script>
