// code for date picker
$( function() {
    $( "#qsl_date" ).datepicker({ dateFormat: 'dd-mm-yy'});
});

// code for multi select
$(document).ready(function() {
    $('#t_subject').multiselect({
        numberDisplayed: 1,
        nonSelectedText: 'Choose Subjects',
        maxHeight: 200,
        inheritClass: true,
        buttonWidth: '303px',
    });
});

//JS Page
$('#manage_subjects').submit(function(e){

	e.preventDefault();

  var test_nm = $('#test_nm').val();
  var qsl_date = $('#qsl_date').val();
  var total_q = $('#total_q').val();
  var test_type = $('#test_type').val();
  var t_course = $('#t_course').val();
  var t_subject = $('#t_subject').val();
  var sem = $('#sem').val();

  if (test_nm=='')
  {
    $('.modal-body').html("Please Enter Test Name");
    $("#myModal").modal();
  }
  else if (qsl_date=='')
  {
    $('.modal-body').html("Please Enter Question Submission Last Date");
    $("#myModal").modal();
  }
  else if (total_q=='')
  {
    $('.modal-body').html("Please Enter Total No. of Questions");
    $("#myModal").modal();
  }
  else if (test_type=='0')
  {
    $('.modal-body').html("Please Choose Test Type");
    $("#myModal").modal();
  }
  else if (t_course=='0')
  {
    $('.modal-body').html("Please Choose Course");
    $("#myModal").modal();
  }
  else if (sem=='0')
  {
    $('.modal-body').html("Please Choose Semester");
    $("#myModal").modal();
  }
  else if ($("select[name='t_subject[]'] option:selected").length==0)
  {
    $('.modal-body').html("Please Choose Test Subject");
    $("#myModal").modal();
  }
  else
  {
    $.ajax({
      url: $(this).attr('action'),
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){
        if(data == "1")
        {
          $('.modal-body').html("Test name already exists");
          $("#myModal").modal();
        }
        else if(data == "2")
        {
          $('.modal-body').html("A test in the same course and semester already exists");
          $("#myModal").modal();
        }
        else if(data == "3")
        {
          $('.modal-body').html("New Test Created");
          $("#myModal").modal();
          $('#myModal').on('hidden.bs.modal', function () {
            location.reload();
          });
        }
        else if(data == "4")
        {
          $('.modal-body').html("Subject not selected");
          $("#myModal").modal();
        }
        else
        {
          $('.modal-body').html("Undefined Error");
          $("#myModal").modal();
        }
      },
      error: function(){}
    });
  }
});
