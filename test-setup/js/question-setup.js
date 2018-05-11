
      
      $(document).ready(function(){

        $(".modal-body").css({"font-size": "15px"});

            var test_id = $('#test_id').val();
            var course_id = $('#course_id').val();
            var subject_id = $('#subject_id').val();

          $('#submit').click(function(event) {

            event.preventDefault();

            var question = $('#question').val();
            var op1 = $('#op1').val();
            var op2 = $('#op2').val();
            var op3 = $('#op3').val();
            var op4 = $('#op4').val();
            var answer = $('#answer').val();


            if (test_id=='') 
            {
              $('.modal-body').html("Please enter the question");
              $("#myModal").modal();
            }
            else if (course_id=='') 
            {
              $('.modal-body').html("Please enter the question");
              $("#myModal").modal();
            }
            else if (subject_id=='') 
            {
              $('.modal-body').html("Please enter the question");
              $("#myModal").modal();
            }
            else if (question=='') 
            {
              $('.modal-body').html("Please enter the question");
              $("#myModal").modal();
            }
            else if (op1=='') 
            {
              $('.modal-body').html("Please enter option 1");
              $("#myModal").modal();
            }
            else if (op2=='') 
            {
              $('.modal-body').html("Please enter option 2");
              $("#myModal").modal();
            }
            else if (op3=='') 
            {
              $('.modal-body').html("Please enter option 3");
              $("#myModal").modal();
            }
            else if (op4=='') 
            {
              $('.modal-body').html("Please enter option 4");
              $("#myModal").modal();
            }
            else if (answer=='') 
            {
              $('.modal-body').html("Please enter the right answer");
              $("#myModal").modal();
            }
            else
            {
                $.ajax({
                type: 'POST',
                url: 'code/q-setup-submit.php',
                data: ({ test_id: test_id, course_id: course_id, subject_id: subject_id, question: question, op1: op1, op2: op2, op3: op3, op4: op4, answer: answer }),

                success: function(response) {

                    if(response == "1")
                    {
                        $('.modal-body').html("Question has been added");
                        $("#myModal").modal();
                        $('#myModal').on('hidden.bs.modal', function () {
                           location.reload();
                          })
                    }
                }

              });
            }
            
          });


          $('#pause').click(function(event) {

            $.ajax({
                type: 'POST',
                url: 'code/q-setup-pause.php',
                data: ({ test_id: test_id, course_id: course_id, subject_id: subject_id }),

                success: function(response2) {

                    if(response2 == "1")
                    {
                        $('.modal-body').html("Question setup paused");
                        $("#myModal").modal();
                        $('#myModal').on('hidden.bs.modal', function () {
                           window.location.href='../cpanel/';
                          })
                    }
                }

              });

          });



          $('#complete').click(function(event) {

            $.ajax({
                type: 'POST',
                url: 'code/q-setup-complete.php',
                data: ({ test_id: test_id, course_id: course_id, subject_id: subject_id }),

                success: function(response3) {

                    if(response3 == "1")
                    {
                        $('.modal-body').html("Question setup completed");
                        $("#myModal").modal();
                        $('#myModal').on('hidden.bs.modal', function () {
                           window.location.href='../cpanel/';
                          })
                    }
                    else
                    {
                      $('.modal-body').html("You have not submitted total required questions");
                      $("#myModal").modal();
                    }
                }

              });

          });


      });
