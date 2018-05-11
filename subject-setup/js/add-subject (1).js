
      
      $(document).ready(function(){

        $(".modal-body").css({"font-size": "15px"});

          $('#submit').click(function(event) {

            event.preventDefault();

            var sub_nm = $('#sub_nm').val();

            if (sub_nm=='') 
            {
              $('.modal-body').html("Please Enter Subject Name");
              $("#myModal").modal();
            }
            else
            {
                $.ajax({
                type: 'POST',
                url: 'code/add-subject2.php',
                data: ({ sub_nm: sub_nm }),
                success: function(response) {

                    if(response == "1")
                    {
                        $('.modal-body').html("Subject already exists");
                        $("#myModal").modal();
                    }
                    else
                    {
                        $('.modal-body').html("New Subject Added");
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
