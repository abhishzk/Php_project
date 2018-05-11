

// code for clock display - start

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clockdiv').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

// code for clock display - end



function divReload(t_id,s_id,sem,c_id,q_id,v)
{
    $("#ques_load").load("code/test3.php?t_id="+t_id+"&s_id="+s_id+"&sem="+sem+"&c_id="+c_id+"&q_id="+q_id+"&v="+v).fadeIn("fast");
}


      $(document).ready(function(){

        $(".modal-body").css({"font-size": "15px"});

          $('#save').click(function(event) {

            event.preventDefault();

            var v = 3; var m = 0;

            var option_1 = $('#option1').val();
            var option_2 = $('#option2').val();
            var option_3 = $('#option3').val();
            var option_4 = $('#option4').val();
            var test_id = $('#test_id').val();
            var course_id = $('#course_id').val();
            var subject_id = $('#subject_id').val();
            var sem = $('#sem').val();
            var question_id = $('#test_sl').val();

            if(! $('#option1').is(':checked') && ! $('#option2').is(':checked') && ! $('#option3').is(':checked') && ! $('#option4').is(':checked'))
            {
              $('.modal-body').html("Please select one answer");
              $("#myModal").modal();
            }
            else
            { 
              if($('#option1').is(':checked'))
              {
                var option = "1";
              }
              else if($('#option2').is(':checked'))
              {
                var option = "2";
              }
              else if($('#option3').is(':checked'))
              {
                var option = "3";
              }
              else if($('#option4').is(':checked'))
              {
                var option = "4";
              }
              else
              {
                var option = "5";
              }

                $.ajax({
                type: 'POST',
                url: 'code/test3.php',
                data: ({ t_id: test_id, c_id: course_id, s_id: subject_id, sem: sem, option: option, v: v, q_id: question_id }),
                success: function(response)
                {
                  $("#ques_load").load("code/test3.php?t_id="+test_id+"&s_id="+subject_id+"&sem="+sem+"&c_id="+course_id+"&q_id="+question_id+"&v="+m+"&option="+option).fadeIn("fast");
                }

              });
            }
            
          });
      });

