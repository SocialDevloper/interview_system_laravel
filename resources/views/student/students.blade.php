<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 7 - DataTables Server Side Processing using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
 </head>
 <style>
  .alert-message {
    color: red;
  }
</style>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Laravel 7 Student Ajax Crud Tutorial - Form Attributes Used</h3>
     <br />
     <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
     </div>
     <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
                <th width="10%">Image</th>
                <th width="10%">Name</th>
                <th width="5%">Gender</th>
                <th width="5%">Age</th>
                <th width="15%">Birthdate</th>
                <th width="15%">Hobbies</th>
                <th width="20%">Action</th>
            </tr>
           </thead>
       </table>
   </div>
   <br />
   <br />
  </div>
 </body>
</html>

<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
                    <label for="name" class="col-sm-2">Name *</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" autocomplete="off" name="name" id="name" value="{{ old('name') }}">
                        <span id="nameError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3">Email address *</label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" autocomplete="off" name="email" id="email" value="{{ old('email') }}">
                        <span id="emailError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group password">
                    <label for="name" class="col-sm-3">Password *</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" autocomplete="off" id="password" name="password">
                        <span id="passwordError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-6">Gender *</label>
                    <label for="name" class="col-sm-6">Age *</label>
                    <div class="col-sm-6">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                          <label class="form-check-label" for="gender">Male</label>

                          <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                          <label class="form-check-label" for="gender">Female</label>
                        </div>
                        <span id="genderError" class="alert-message"></span>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="age" name="age">
                        <span id="ageError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-6">Phone Number</label>
                    <label for="name" class="col-sm-6">Birth Date *</label>
                    <div class="col-sm-6">
                        <div class="form-check">
                          <input type="text" class="form-control" name="phone_number" id="phone_number" autocomplete="off" value="{{ old('phone_number') }}">
                        </div>
                        <span id="phone_numberError" class="alert-message"></span>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control date" name="birth_date" id="birth_date" autocomplete="off" value="{{ old('birth_date') }}">
                        <span id="birth_dateError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3">Hobbies *</label>
                    <div class="col-sm-12">
                      <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="hobby[]" value="playing" @if(in_array('playing', explode(",", @$employee->hobbies))) checked @endif @if(is_array(old('hobby')) && in_array('playing', old('hobby'))) checked @endif>
                      <label class="form-check-label" for="hobby">Playing</label>
                    
                      <input class="form-check-input" type="checkbox" name="hobby[]" value="travelling" @if(in_array('travelling', explode(",", @$employee->hobbies))) checked @endif @if(is_array(old('hobby')) && in_array('travelling', old('hobby'))) checked @endif>
                      <label class="form-check-label" for="hobby">Travelling</label>
                    
                      <input class="form-check-input" type="checkbox" name="hobby[]" value="photography" @if(in_array('photography', explode(",", @$employee->hobbies))) checked @endif @if(is_array(old('hobby')) && in_array('photography', old('hobby'))) checked @endif>
                      <label class="form-check-label" for="hobby">Photography</label>
                    
                      <input class="form-check-input" type="checkbox" name="hobby[]" value="learning" @if(in_array('learning', explode(",", @$employee->hobbies))) checked @endif @if(is_array(old('hobby')) && in_array('learning', old('hobby'))) checked @endif>
                      <label class="form-check-label" for="hobby">Learning</label>
                    
                      <input class="form-check-input" type="checkbox" name="hobby[]" value="drawing" @if(in_array('drawing', explode(",", @$employee->hobbies))) checked @endif @if(is_array(old('hobby')) && in_array('drawing', old('hobby'))) checked @endif>
                      <label class="form-check-label" for="hobby">Drawing</label>
                      </div>
                        <span id="hobbyError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">Address</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" id="address" name="address" placeholder="Enter address" rows="4" cols="50" autocomplete="off">
                        </textarea>
                        <span id="addressError" class="alert-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-6">Cource *</label>
                    <label for="name" class="col-sm-6">Profile Image</label>
                    <div class="col-sm-6">
                        <div class="form-check">
                          <select class="form-control" id="cource" autocomplete="off" name="cource">
                            <option value="">Select cource</option>
                            <option value="MCA" {{ old('cource') }}>MCA</option>
                            <option value="BCA" {{ old('cource') }}>BCA</option>
                            <option value="M.Sc(CA&IT)" {{ old('cource') }}>M.Sc(CA&IT)</option>
                            <option value="B.Tech" {{ old('cource') }}>B.Tech</option>
                          </select>
                        </div>
                        <span id="courceError" class="alert-message"></span>
                    </div>
                    <div class="col-sm-6">
                        <input type="file" class="form-control-file" id="image" name="image">
                        <span id="store_image"></span>
                        <span id="imageError" class="alert-message"></span>
                    </div>
                </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){

  /* datepicker scrolling issue*/
  var datePicker = $(".date").datepicker({});
  var t ;
  $( document ).on(
      'DOMMouseScroll mousewheel scroll',
      '#formModal', 
      function(){       
          window.clearTimeout( t );
          t = window.setTimeout( function(){            
              $('.date').datepicker('place')
          }, 100 );        
      }
  );

  $('#formModal').on('shown.bs.modal', function() {
    $('.date').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      orientation: "bottom auto",
      endDate: '+0d',
    });
  });

 $('#user_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('students.index') }}",
  },
  columns:[
   {
    data: 'image',
    name: 'image',
    render: function(data, type, full, meta){
     return "<img src={{ URL::to('/') }}/stud_images/" + data + " width='70' class='img-thumbnail' />";
    },
    orderable: false
   },
   {
    data: 'name',
    name: 'name'
   },
   {
    data: 'gender',
    name: 'gender'
   },
   {
    data: 'age',
    name: 'age'
   },
   {
    data: 'birth_date',
    name: 'birth_date'
   },
   {
    data: 'hobbies',
    name: 'hobbies'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 $('#create_record').click(function(){
  $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
     $('#formModal').modal('show');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('students.store') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      //$('#nameError').text(data.errors[0]);
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#user_table').DataTable().ajax.reload();
      $('#formModal').modal('hide');
     }
     $('#form_result').html(html);
    }
   })
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('students.update') }}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#store_image').html('');
      $('#user_table').DataTable().ajax.reload();
      $('#formModal').modal('hide');
     }
     $('#form_result').html(html);
    }
   });
  }
 });

 $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $(".password").hide();
  $('#sample_form').trigger("reset");

  /* get all checkbox value get */
  /*var hobbyss = [];
  $(":checkbox").each(function(index,element){
      hobbyss.push($(this).val());
  });*/

  $.ajax({
   url:"/students/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
    $('#email').val(html.data.email);

    /* bind radio button value */
    if (html.data.gender == 'male')
      $(':radio[name=gender][value="male"]').prop('checked', true);
    else
      $(':radio[name=gender][value="female"]').prop('checked', true);

    /* --- set checkbox value */
    string = html.data.hobbies;
    var array = string.split(",");
    $.each(array, function(i, val){
       $("input[value='" + val + "']").prop('checked', true);
    });

    $('#age').val(html.data.age);
    $('#phone_number').val(html.data.phone_number);

    $('#birth_date').val(ChangeFormateDate(html.data.birth_date));
    $('#address').val(html.data.address);
    $('#cource').val(html.data.cource);

    $('#store_image').html("<img src={{ URL::to('/') }}/stud_images/" + html.data.image + " width='70' class='img-thumbnail' />");
    $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("Edit New Record");
    $('#action_button').val("Edit");
    $('#action').val("Edit");
    $('#formModal').modal('show');
   }
  })
 });

 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"students/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    }, 2000);
   }
  })
 });


  function ChangeFormateDate(oldDate){
    return oldDate.toString().split("-").reverse().join("-");
  }

});
</script>