<?php
include '../config.php';

if($ck!=1)
{
  header("Location: ../login/");
}
else
{
	$c = 0; $total = 0;

      $test_id = base64_decode($_REQUEST['test_id']);
      $subject_id = base64_decode($_REQUEST['subject_id']);
      $course_id = base64_decode($_REQUEST['course_id']);
      $sem = base64_decode($_REQUEST['sem']);

	$get_user = mysqli_query($conn,"SELECT * FROM test WHERE test_id = '$test_id' and subject_id = '$subject_id' and course_id = '$course_id' and sem_id = '$sem' and student_id = '$id1'");
	while($row_user = mysqli_fetch_array($get_user))
	{
		$c++;
  }

  $get_user = mysqli_query($conn,"SELECT * FROM answer WHERE test_id = '$test_id' and subject_id = '$subject_id' and course_id = '$course_id' and sem = '$sem' and student_id = '$id1'");
  while($row_user = mysqli_fetch_array($get_user))
  {
		$stu_ans = $row_user['student_answer'];
		$right_ans = $row_user['right_answer'];

		if ($stu_ans == $right_ans) 
		{
			$total++;
		}
	}

	$percentage = ($total/$c)*100;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Result</title>

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
                <h3><i class="fa fa-cog"></i>&nbsp;Result</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                  <h2>Check your Result</h2>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <form class="form-horizontal form-label-left" name="profile_frm" id="profile_frm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

					<label style="font-size: 24px;">You have scored : <?php echo $total; ?> out of <?php echo $c; ?></label>
					<label style="font-size: 24px;">Your percentage is : <?php echo $percentage;?> %</label>

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
                  <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
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
?>
