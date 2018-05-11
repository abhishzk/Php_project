

      
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
            $("#teacher_div").load("code/teacher-show.php?mobile="+mobile).fadeIn("fast");           
          }
    
        });


          $('#submit').click(function(event) {

            event.preventDefault();

            var course = $('#course').val();
            var subject = $('#subject').val();
            var teacher = $('#teacher').val();
            var sem = $('#sem').val();

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
            else if (subject=='0') 
            {
              $('.modal-body').html("Please Choose Subject");
              $("#myModal").modal();
            }
            else if (teacher=='0') 
            {
              $('.modal-body').html("Please Choose Teacher");
              $("#myModal").modal();
            }
            else
            {
                $.ajax({
                type: 'POST',
                url: 'code/assign-subject2.php',
                data: ({ course: course, subject: subject, teacher: teacher, sem: sem }),
                success: function(response) {

                    if(response == 1)
                    {
                        $('.modal-body').html("Subject already Assigned");
                        $("#myModal").modal();
                    }
                    else
                    {
                        $('.modal-body').html("New subject assigned to teacher");
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
