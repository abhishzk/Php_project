<?php
include '../config.php';

if($ck!=1)
{
  header("Location: ../login/");
}
else
{

  if ($lvl_u == "-10")
  {
    header("Location: ../cpanel/");
  }
  else
  {

    $get_user = mysqli_query($conn,"SELECT * FROM user_dtls where user_id = '$id1'");
    while($row_user=mysqli_fetch_array($get_user))
    {
      $nm=$row_user['user_nm'];
      $add=$row_user['user_add'];
      $gender=$row_user['user_gender'];
      $phone=$row_user['user_ph'];
      $email=$row_user['user_email'];
    }

    $get_user = mysqli_query($conn,"SELECT * FROM login_tbl where u_id = '$id1'");
    while($row_user=mysqli_fetch_array($get_user))
    {
      $image=$row_user['image'];
    }

    if ($gender == "1") 
    {
      $gender = "Male";
    }
    else
    {
      $gender = "Female";
    }


    if (isset($_POST['submit'])) 
    {

      $pimg=$_FILES['img']['name'];

      if($_FILES['img']['tmp_name']!="")
      { 
        if ((($_FILES["img"]["type"] == "image/gif")
              || ($_FILES["img"]["type"] == "image/png")
              || ($_FILES["img"]["type"] == "image/jpeg")
              || ($_FILES["img"]["type"] == "image/pjpeg"))
              && ($_FILES["img"]["size"] < 99999999) )
        {
                copy($_FILES['img']['tmp_name'],"../images/".$pimg);

          $query_update = mysqli_query($conn,"UPDATE login_tbl set image='$pimg' where u_id='$id1'");
        }


      }

    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Details</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../css/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../css/custom.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../css/pnotify.css" rel="stylesheet">
    <link href="../css/pnotify.buttons.css" rel="stylesheet">
    <link href="../css/pnotify.nonblock.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../css/responsive.bootstrap.css" rel="stylesheet">

    <style type="text/css" media="screen">
      #clockdiv{
        font-family: sans-serif;
        display: inline-block;
        font-weight: 100;
        text-align: center;
        /*font-size: 30px;*/
        font-size: 6em;
      }

    </style>

  <script type="text/javascript">
    function funUpdate(id)
    {
        setTimeout(function(){
          $('#light_box').load('modal/u-modal.php?id='+id); /*Modal Content Load from page location*/
          $('#lightbox_modal').modal('show'); /* Loaded Modal Show*/
        }, 100);
    }
  </script>

  </head>
  

  <body class="nav-md" id="body1">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <!--Site Title-->
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="fa fa-location-arrow"></i> <span>Examination Portal cPanel</span></a>
            </div>
            <!--Site Title-->
            <div class="clearfix"></div>

            <br />
            <!--SideBar-->
              <?php include "../sidebar/sidebar.php";?>
            <!--SideBar-->

          </div>
        </div>

        <!--NavBar-->
            <?php include "../navbar/navbar.php";?>
        <!--NavBar-->

        <!-- page content -->
        <div class="right_col" role="main" style="">
          <div class="" style="margin-top:50px;">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-cog"></i>&nbsp;Update Profile Details</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                  <h2>Update your profile details</h2>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <form class="form-horizontal form-label-left" name="profile_frm" id="profile_frm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                    <div class="item form-group row">
                      <div class="col-md-3" align="right"><b>User ID <span class="required">:</span></b></div>
                      <div class="col-md-4"><b><?php echo $id1; ?></b></div>
                    </div>

                    <div class="item form-group row">
                        <div class="col-md-3" align="right"><b>Name <span class="required">:</span></b></div>
                        <div class="col-md-4"><b><?php echo $nm; ?></b></div>
                        <div class="col-md-4"><a href="javascript:void(0);" style="color: blue;" onclick="funUpdate('nm')"><b>Update</b></a></div>
                    </div>

                    <div class="item form-group row">
                        <div class="col-md-3" align="right"><b>Address <span class="required">:</span></b></div>
                        <div class="col-md-4"><b><?php echo $add; ?></b></div>
                        <div class="col-md-4"><a href="javascript:void(0);" style="color: blue;" onclick="funUpdate('add')"><b>Update</b></a></div>
                    </div>

                    <div class="item form-group row">
                        <div class="col-md-3" align="right"><b>Phone No. <span class="required">:</span></b></div>
                        <div class="col-md-4"><b><?php echo $phone; ?></b></div>
                        <div class="col-md-4"><a href="javascript:void(0);" style="color: blue;" onclick="funUpdate('ph')"><b>Update</b></a></div>
                    </div>
                    
                    <div class="item form-group row">
                        <div class="col-md-3" align="right"><b>E-mail ID <span class="required">:</span></b></div>
                        <div class="col-md-4"><b><?php echo $email; ?></b></div>
                        <div class="col-md-4"><a href="javascript:void(0);" style="color: blue;" onclick="funUpdate('email')"><b>Update</b></a></div>
                    </div>

                    <div class="item form-group row">
                      <div class="col-md-3" align="right"><b>Password <span class="required">:</span></b></div>
                      <div class="col-md-4"><b>...........</b></div>
                      <div class="col-md-4"><a href="javascript:void(0);" style="color: blue;" onclick="funUpdate('pass')"><b>Update</b></a></div>
                    </div>

                    <div class="item form-group row">
                      <div class="col-md-3" align="right"><b>User ID <span class="required">:</span></b></div>
                      <div class="col-md-4"><img src="../images/<?php echo $image; ?>" width="145" height="126" alt="Planets"></div>
                    </div>

                    <div class="item form-group row">
                      <div class="col-md-3" align="right"></div>
                      <div class="col-md-6"><input type="file" name="img" id="img"></div>
                      <div class="col-md-1"><button id="submit" name="submit" type="submit">Update</button></div>
                    </div>

                    <div class="ln_solid"></div>
                  </form>
                </div>
              </div>
              </div>


              <!--Data Tables-->
<!--               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="x_panel" align="center">



              </div>
            </div> -->
              <!--Data tables-->

            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
          <?php include "../footer/footer.php";?>
        <!-- /footer content -->
      </div>
    </div>


      <!-- Modal -->

       <div id="lightbox_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
         <div id="light_box">

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
    <!-- PNotify -->
    <script src="../js/pnotify.js"></script>
    <script src="../js/pnotify.buttons.js"></script>
    <script src="../js/pnotify.nonblock.js"></script>
    <!-- jquery.inputmask -->
    <script src="../js/jquery.inputmask.bundle.js"></script>
    <!-- /jquery.inputmask -->
    <!-- Datatables -->
    <script src="../js/jquery.dataTables.js"></script>
    <!--<script src="../js/dataTables.bootstrap.js"></script>--> <!--NOTE :this file displaces the table search field-->
    <script src="../js/dataTables.responsive.js"></script>
    <script src="../js/responsive.bootstrap.js"></script>

    <!-- jquery code to change css -->
    <script type="text/javascript">
       $(".site_title").css({"font-size": "15px"});
    </script>


  </body>
</html>
<?php
  }
}
?>