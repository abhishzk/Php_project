<?php
  include '../config.php';
  // include '../functions.php';

  $Err1 = $success = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
      $u_id = $_POST['uid'];
      $password = $_POST['upass'];
  }
if($ck==1)
{
  header("Location: ../cpanel/");
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Examination Portal | Login </title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../css/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <div style="text-align:center;">
             <img src="../images/icon-img/amp.jpg" class="img-circle" alt="" width="100" height="100">
          </div>
          <section class="login_content">
            <form name="login" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <h1>Portal Login</h1>
              <div>
                <input type="text" class="form-control" name="uid" id="uid" placeholder="Username" value="" />
              </div>
              <div>
                <input type="password" class="form-control" name="upass" id="upass" placeholder="Password" value="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default" name="login" id="login" value="Log In" alt="100">
                <!-- <a class="reset_pass" href="lost_pass.php">Lost your password?</a> -->
              </div>
              <div class="clearfix"></div>
              
              <div class="separator">
                <div>
                  <h1><i class="fa fa-location-arrow"></i> Online Examination Portal</h1>
                  <p>Second Year Project | @2018</p>
                  <p>BVDU - Amplify DITM</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>



          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body" align="center">
                  Some text in the modal.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="../js/bootstrap.js"></script>
    <!-- FastClick -->
    <script src="../js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../js/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.js"></script>


<script type="text/javascript">

$(document).ready(function() {     

  $(".modal-body").css({"font-size": "15px"});
  $(".login_content").css({"font-size": "18px"});
  $(".reset_pass").css({"font-size": "15px"});

 $('#login').click(function(event) {

    event.preventDefault();

    var uid = $('#uid').val();
    var upass = $('#upass').val();

    if (uid=='') 
    {
      $('.modal-body').html("Please Enter Your Username");
      $("#myModal").modal();
    }
    else if (upass=='') 
    {
      $('.modal-body').html("Please Enter Your Password");
      $("#myModal").modal();
    }
    else
    {
        $.ajax({
        type: 'POST',
        url: 'login2.php',
        data: ({ uid: uid, upass: upass }),
        success: function(response) {

            if(response == "1")
            {
                 window.location.href = '../cpanel/';
            }
            else if(response == "2")
            {
              $('.modal-body').html("Your account has been deactivated");
              $("#myModal").modal();
            }
            else
            {
                $('.modal-body').html("Invalid Username or Password");
                $("#myModal").modal();
            }
        }
      });
    }
    
  });
 
});

</script>


  </body>
</html>
<?php
}
?>
