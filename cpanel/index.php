<?php

include '../config.php';

  // $timestamp = strtotime(date('H:i')) + 60*60/2; //30Min
  // $vtm = date('H:i', $timestamp);
  // $min="30 Minutes";

  // echo $vtm;

if($ck!=1)
{
  header("Location: ../login/");
}
else
{
  $status = $qsld = $test_id = $course_id = $subject_id = "";
  $stat = 0;

  date_default_timezone_set('Asia/Kolkata');
  $date = date('d-m-Y') ;
  $time = date('H:i');

    $get = mysqli_query($conn,"SELECT * FROM q_temp where teacher_id='$id1' and (status='1' or status='2' )");
    if($row = mysqli_fetch_array($get))
    {
      $s = 9;
    }
    else
    {
      $s = 0;
    }

    $get = mysqli_query($conn,"SELECT * FROM q_temp where teacher_id='$id1' and status='1' or status='2' or status ='0'");
    while($row = mysqli_fetch_array($get))
    {
      $test_id = $row['test_id'];
      $course_id = $row['course_id'];
      $subject_id = $row['subject_id'];
      $status = $row['status'];
    }


    $get2 = mysqli_query($conn,"SELECT * FROM create_test where test_id='$test_id'");
    while($row2 = mysqli_fetch_array($get2))
    {
      $qsld = $row2['question_submission_last_dt'];
    }

    if (strtotime($date) > strtotime($qsld))
    {
      $query_update2 = mysqli_query($conn,"UPDATE q_temp set status='$stat' where teacher_id='$id1' and test_id='$test_id' and subject_id='$subject_id' and course_id='$course_id'");
    }


$get_stud = mysqli_query($conn,"SELECT * FROM student_setup where student_id='$id1' and stat='1'");
while($row_stud = mysqli_fetch_array($get_stud))
{
  $course_id2 = $row_stud['course_id'];
  $sem = $row_stud['sem'];

  $subjects = explode(",", $row_stud['subjects']);
  foreach($subjects as $sub) 
  { 
    $sub = trim($sub);
    
    $get_test2 = mysqli_query($conn,"SELECT * FROM test_dtls where test_course='$course_id2' and test_semester='$sem' and test_subject='$sub' and test_stat='1'");
    while($row_test2 = mysqli_fetch_array($get_test2))
    {
      $test_id2 = $row_test2['test_id'];
      $test_subject = $row_test2['test_subject'];
      $test_date = $row_test2['test_date'];
      $test_start_time = $row_test2['test_start_time'];
      $test_end_time = $row_test2['test_end_time'];

      $n = 1;
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
    <title>Online Examination Portal</title>

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


  </head>

  <body class="nav-md footer_fixed">
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

<?php

if ($lvl_u == "3" and ($status == "1" or $status == "2" or $s == "0"))
{

?>
      <!-- page content -->
        <div class="right_col" role="main" style="" id="div2">
          
        </div>
      <!-- /page content -->
<?php
}
elseif ($status == "0" and ($lvl_u == "-10" or $lvl_u == "1" or $lvl_u == "3")) 
{
?>
        <!-- page content -->
        <div class="right_col" role="main" style="" id="div3">
          
        </div>
        <!-- /page content -->
<?php
}
else
{
    if($lvl_u == "5" and $n=="1")
    {
?>
      <!-- page content -->
        <div class="right_col" role="main" style="" id="div4">
          
        </div>
        <!-- /page content -->
<?php
    }
    else
    {
?>
      <div class="right_col" role="main" style="" id="div5">
        <div class="" style="margin-top:50px;">
            <div class="page-title">
              <div class="">
                
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="map"></div>
              </div>
            </div>
        </div>
      </div>

<?php 
    }
}
?>
        <!-- footer content -->
          <?php include "../footer/footer.php";?>
        <!-- /footer content -->
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
        <!-- Datatables -->
    <script src="../js/jquery.dataTables.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script> <!--NOTE :this file displaces the table search field-->
    <script src="../js/dataTables.responsive.js"></script>
    <script src="../js/responsive.bootstrap.js"></script>
    <!-- <script src="../js/jquery-custom-msg.js"></script> -->

    <script type="text/javascript">
       $(".site_title").css({"font-size": "15px"});
    </script>

      <!-- Datatables -->
    <script>
      $(document).ready(function() {
        $('#datatable').dataTable();
        $('#datatable-responsive').DataTable();
      });
    </script>
    <!-- /Datatables -->

        <script type="text/javascript">
      
          $("#div2").load("code/index2.php").fadeIn("fast");
          $("#div3").load("code/index3.php").fadeIn("fast");
          $("#div4").load("code/index4.php").fadeIn("fast");

        </script>

  </body>
</html>
<?php
}
?>
