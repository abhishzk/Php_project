
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

      
      $(document).ready(function(){

        $(".modal-body").css({"font-size": "15px"});

        var mobfilter = /^\d{10}$/;

        $('#mobile').blur(function(event) {

          var mobile = $('#mobile').val();

          if (!mobfilter.test(mobile))
          {
            $('.modal-body').html("Invalid Mobile Number");
            $("#myModal").modal();
          }
          else
          {
            $("#student_div").load("code/student-show.php?mobile="+mobile).fadeIn("fast");           
          }
    
        });


          $('#submit').click(function(event) {

            event.preventDefault();

            var course = $('#course').val();
            var sem = $('#sem').val();
            var student = $('#student').val();
            var t_subject = $('#t_subject').val();

            if (course=='0') 
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
              $('.modal-body').html("Please Choose Subjects");
              $("#myModal").modal();
            }
            else if (student=='0') 
            {
              $('.modal-body').html("Please Choose Student");
              $("#myModal").modal();
            }
            else
            {
                $.ajax({
                type: 'POST',
                url: 'code/assign-student2.php',
                data: ({ course: course, sem: sem, t_subject: t_subject, student: student }),
                success: function(response) {

                    if(response == 1)
                    {
                        $('.modal-body').html("Course already assigned to the Student");
                        $("#myModal").modal();
                    }
                    else
                    {
                        $('.modal-body').html("Course assigned to student");
                        $("#myModal").modal();
                        $('#myModal').on('hidden.bs.modal', function () {
                           location.reload();
                          })
                    }
                }

              });
            }
            
          });


      });
