<?php

include '../config.php';

if($ck!=1)
{
  header("Location: ../login/");
}
else
{
  if ($lvl_u != "1")
  {
    header("Location: ../cpanel/");
  }
  else
  {

    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y') ;

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

    <!-- Date Picker -->
    <link href="../css/jquery-ui.css" rel="stylesheet">

    <!-- Time Picker -->
    <link rel="stylesheet" href="../css/bootstrap-clockpicker.css">

    <script type="text/javascript">
      
      function funTest(tid,tsd,tcd,sem)
      {
        setTimeout(function(){
          $('#light_box').load('modal/build-test-modal.php?tid='+tid+'&tsd='+tsd+'&tcd='+tcd+'&sem='+sem).fadeIn("fast"); /*Modal Content Load from page location*/
          $('#lightbox_modal').modal('show'); /* Loaded Modal Show*/
        }, 100);
      }

    </script>

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

// if ($lvl_u == "3" and $status == "1" or $status == "2")
// {

?>
        <!-- page content -->
        <div class="right_col" role="main" style="">
          <div class="" style="margin-top:50px;">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-cog"></i>&nbsp;Test Details</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!--Data Tables-->
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Test Notifications</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Test ID</th>
                        <th>Test Name</th>
                        <th>Question Submission Last Date</th>
                        <th>Total No. of Questions</th>
                        <th>Test Type</th>
                        <th>Course</th>
                        <th>Semester</th>
                        <th>Test Subject</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                    $s_i=0;

                $get_temp = mysqli_query($conn,"SELECT * FROM q_temp where status='0'");
                while($row_temp = mysqli_fetch_array($get_temp))
                { $s_i++;
                  $temp_user_id=$row_temp['teacher_id'];
                  $temp_course_id=$row_temp['course_id'];
                  $temp_subject_id=$row_temp['subject_id'];
                  $temp_test_id=$row_temp['test_id'];

                $get_user = mysqli_query($conn,"SELECT * FROM create_test where test_id='$temp_test_id' and test_stat='1'");
                while($row_user = mysqli_fetch_array($get_user))
                {
                        
                  $sl=$row_user['sl'];
                  $test_id=$row_user['test_id'];
                  $test_nm=$row_user['test_nm'];
                  $qsld=$row_user['question_submission_last_dt'];
                  $tnq=$row_user['total_no_questions'];
                  $test_type=$row_user['test_type'];
                  $test_course=$row_user['test_course'];
                  $test_subject=$row_user['test_subjects'];
                  $sem=$row_user['test_sem'];

                  if ($sem == 1) 
                  {
                    $semester = $sem . "st Semester";
                  }
                  elseif ($sem == '2') 
                  {
                    $semester = $sem . "nd Semester";
                  }
                  elseif ($sem == 3) 
                  {
                    $semester = $sem . "rd Semester";
                  }
                  else 
                  {
                    $semester = $sem . "th Semester";
                  }                  

                  if ($test_type == '1') 
                  {
                    $test_type = "MCQ";
                  }


                    $get_user2 = mysqli_query($conn,"SELECT * FROM subject_dtls where subject_id='$temp_subject_id'");
                    while($row_user2 = mysqli_fetch_array($get_user2))
                    {
                      $subject_nm=$row_user2['subject_nm'];
                    }

                    $get_user3 = mysqli_query($conn,"SELECT * FROM course_dtls where course_id='$temp_course_id'");
                    while($row_user3 = mysqli_fetch_array($get_user3))
                    {
                      $course_nm=$row_user3['course_nm'];
                    }
                ?>
                      <tr>
                        <td><?php echo $s_i;?></td>
                        <td><?php echo $test_id;?></td>
                        <td><?php echo $test_nm;?></td>
                        <td><?php echo $qsld;?></td>
                        <td><?php echo $tnq;?></td>
                        <td><?php echo $test_type;?></td>
                        <td><?php echo $course_nm;?></td>
                        <td><?php echo $semester;?></td>
                        <td><?php echo $subject_nm;?></td>

                        <td align="center">
                        <a href="javascript:void(0);" class="btn btn-primary btn-xs" onclick="funTest('<?php echo $test_id;?>','<?php echo $temp_subject_id;?>','<?php echo $temp_course_id;?>','<?php echo $sem;?>')">Build Test</a>
                        </td>
          
                      </tr>
              <?php

                } 
              }
              ?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
              <!--Data tables-->

            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
          <?php include "../footer/footer.php";?>
        <!-- /footer content -->
      </div>

            <!-- Modal -->

       <div id="lightbox_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
         <div id="light_box">

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
        <!-- Datatables -->
    <script src="../js/jquery.dataTables.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script> <!--NOTE :this file displaces the table search field-->
    <script src="../js/dataTables.responsive.js"></script>
    <script src="../js/responsive.bootstrap.js"></script>

    <!-- Time Picker -->
    <script type="text/javascript" src="../js/bootstrap-clockpicker.js"></script>
    
    <!-- Date Picker -->
    <script type="text/javascript" src="../js/jquery-ui.js"></script>

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

  </body>
</html>
<?php
  }
}
?>
