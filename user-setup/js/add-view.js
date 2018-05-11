
      
      $(document).ready(function(){

        $(".modal-body").css({"font-size": "15px"});

          $("#user_type").change(function(){

            event.preventDefault();

            var user_type = $('#user_type').val();
            var user_pass = $('#user_pass').val();

              if (user_type == "0") 
              { 

              }
              else 
              {
                  $.ajax({
                    type: 'POST',
                    url: 'code/add-view2.php',
                    data: ({ user_type: user_type }),
                    success: function(response) {
                      
                      $('#user_id').val(response);
                    }
                  });


                  $.ajax({
                    type: 'POST',
                    url: 'code/add-view4.php',
                    data: ({ user_type: user_type }),
                    success: function(response) {
                      
                      $('#user_pass').val(response);
                    }
                  });
              }
          });
 



          $('#submit').click(function(event) {

            var mobfilter = /^\d{10}$/;

            var emailfilter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            var lvl;

            event.preventDefault();

            var user_id = $('#user_id').val();
            var user_pass = $('#user_pass').val();
            var user_type = $('#user_type').val();
            var user_nm = $('#user_nm').val();
            var user_add = $('#user_add').val();
            var user_ph = $('#user_ph').val();
            var user_email = $('#user_email').val();


            if (user_type=='0') 
            {
              $('.modal-body').html("Please Select User Type");
              $("#myModal").modal();
            }
            else if (user_pass=='') 
            {
              $('.modal-body').html("Please Enter Password");
              $("#myModal").modal();
            }
            else if (user_nm=='') 
            {
              $('.modal-body').html("Please Enter Full Name");
              $("#myModal").modal();
            }
            else if (user_add=='') 
            {
              $('.modal-body').html("Please Enter Addresss");
              $("#myModal").modal();
            }
            else if(! $('#user_gender').is(':checked') && ! $('#user_gender2').is(':checked'))
            {
              $('.modal-body').html("Please Select Gender");
              $("#myModal").modal();
            }
            else if (user_ph=='') 
            {
              $('.modal-body').html("Please Enter Phone");
              $("#myModal").modal();
            }
            else if (!mobfilter.test(user_ph))
            {
              $('.modal-body').html("Invalid Mobile Number");
              $("#myModal").modal();
            }
            else if (user_email=='') 
            {
              $('.modal-body').html("Please Enter E-mail");
              $("#myModal").modal();
            }
            else if (!emailfilter.test(user_email))
            {
                $('.modal-body').html("Invalid E-mail ID");
                $("#myModal").modal();
            }
            else
            {
              if($('#user_gender').is(':checked'))
              {
                var user_gender = "1";
              }
              else
              {
                var user_gender = "2";
              }

              if(user_type == "1")
              {
                lvl = "1";
              }
              else if(user_type == "2")
              {
                lvl = "3";
              }
              else
              {
                lvl = "5";
              }

                $.ajax({
                type: 'POST',
                url: 'code/add-view3.php',
                data: ({ user_type: user_type, user_id: user_id, user_pass: user_pass, user_nm: user_nm,
                user_add: user_add, user_gender: user_gender, user_email: user_email, user_ph: user_ph, lvl: lvl }),
                success: function(response) {

                    if(response == "1")
                    {
                        $('.modal-body').html("User ID already exists");
                        $("#myModal").modal();
                    }
                    else if(response == "2")
                    {
                        $('.modal-body').html("Duplicate Phone Number found");
                        $("#myModal").modal();
                    }
                    else if(response == "3")
                    {
                        $('.modal-body').html("Duplicate E-mail ID found");
                        $("#myModal").modal();
                    }
                    else
                    {
                        $('.modal-body').html("Account Created");
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
