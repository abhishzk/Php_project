<?php
include '../config.php';

if($ck!=1)
{
  header("Location: ../login/");
}
else
{
  if ($lvl_u != "5")
  {
    header("Location: ../cpanel/");
  }
  else
  {

    if (isset($_REQUEST['test_id']))
    {
      $test_id = base64_decode($_REQUEST['test_id']);
      $subject_id = base64_decode($_REQUEST['subject_id']);
      $course_id = base64_decode($_REQUEST['course_id']);
      $sem = base64_decode($_REQUEST['sem']);

      $get_test3 = mysqli_query($conn,"SELECT * FROM create_test where test_id='$test_id'");
      if($row_test3 = mysqli_fetch_array($get_test3))
      {
        $tnq = $row_test3['total_no_questions'];
      }


      $get_test2 = mysqli_query($conn,"SELECT * FROM final_questions where test_id='$test_id' and subject_id='$subject_id' and q_status='1'");
      if($row_test2 = mysqli_fetch_array($get_test2))
      {
        $test_sl = $row_test2['sl'];
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
    <title>Examination Portal - Test</title>

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

  <input type="hidden" name="test_id" id="test_id" value="<?php echo $test_id; ?>">
  <input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id; ?>">
  <input type="hidden" name="subject_id" id="subject_id" value="<?php echo $subject_id; ?>">
  <input type="hidden" name="sem" id="sem" value="<?php echo $sem; ?>">
  

  <body class="nav-md" id="body1" onload="startTime()">
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
                <h3><i class="fa fa-cog"></i>&nbsp;Online Test</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                  <h2>Answer the questions<small>Answer the following questions before the timer expires.</small></h2>

                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <form class="form-horizontal form-label-left" name="test_frm" id="test_frm" method="POST" action="code/test3.php">

<!--div reload-->
<div id="ques_load">
<input type="hidden" name="test_sl" id="test_sl" value="<?php echo $test_sl; ?>">
<?php
      $status = 1; $x = 1; $y = 2; $z = 3; $c = 0;

      $sql = mysqli_query($conn,"SELECT * FROM test where test_id='$test_id' and subject_id='$subject_id' and course_id='$course_id' and sem_id='$sem' and student_id='$id1' and (status='1' or status='3')");
      while ($row2 = mysqli_fetch_array($sql)) 
      {
        $c++;
      }
        // $rowcount = mysqli_num_rows($result);

      if($c < $tnq)
      {
      aa:
      // header('location:index.php?a=$a&b=$b')

      $get_test2 = mysqli_query($conn,"SELECT * FROM final_questions where test_id='$test_id' and subject_id='$subject_id' and q_status='1' ORDER BY RAND() LIMIT 1");
      if($row_test2 = mysqli_fetch_array($get_test2))
      {
        $question_id = $row_test2['sl'];
        $test_question = $row_test2['question'];
        $test_option1 = $row_test2['option_1'];
        $test_option2 = $row_test2['option_2'];
        $test_option3 = $row_test2['option_3'];
        $test_option4 = $row_test2['option_4'];
        $test_right_answer = $row_test2['right_answer'];

        $get_test3 = mysqli_query($conn,"SELECT * FROM test where test_id='$test_id' and question_id='$question_id' and subject_id='$subject_id' and course_id='$course_id' and sem_id='$sem'");
        if($row_test3 = mysqli_fetch_array($get_test3))
        {
          $status = $row_test3['status'];

          if($status == "1" or $status == "3")
          {
            goto aa;
          }
          else
          {
            ?>
            <div class="item form-group">
              <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <p class="" id="test_question" name="test_question" type="text"><?php echo $test_question; ?></p>
              </div>
            </div>

            <div class="item form-group">
              <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <input type="radio" name="ans" id="option1" value="1"> <?php echo $test_option1; ?> <br>
                <input type="radio" name="ans" id="option2" value="2"> <?php echo $test_option2; ?> <br>
                <input type="radio" name="ans" id="option3" value="3"> <?php echo $test_option3; ?> <br>
                <input type="radio" name="ans" id="option4" value="4"> <?php echo $test_option4; ?>
              </div>
            </div>
            <?php
          }
        }
        else
        {
          ?>
          <div class="item form-group">
            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
              <p class="" id="test_question" name="test_question" type="text"><?php echo $test_question; ?></p>
            </div>
          </div>

          <div class="item form-group">
            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
              <input type="radio" name="ans" id="option1" value="1"> <?php echo $test_option1; ?> <br>
              <input type="radio" name="ans" id="option2" value="2"> <?php echo $test_option2; ?> <br>
              <input type="radio" name="ans" id="option3" value="3"> <?php echo $test_option3; ?> <br>
              <input type="radio" name="ans" id="option4" value="4"> <?php echo $test_option4; ?>
            </div>
          </div>
          <?php
        }
      }


 ?>
        <input type="hidden" name="question_id" id="question_id" value="<?php echo $question_id; ?>">

                 <div class="ln_solid"></div>
                    <div class="form-group">
                      <div align="center" class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <button id="skip" name="skip" type="button" class="btn btn-danger" onclick="divReload('<?php echo $test_id; ?>','<?php echo $subject_id; ?>','<?php echo $sem; ?>','<?php echo $course_id; ?>','<?php echo $question_id; ?>','<?php echo $x; ?>')">Skip</button>
                        <button id="t_skip" name="t_skip" type="button" class="btn btn-primary" onclick="divReload('<?php echo $test_id; ?>','<?php echo $subject_id; ?>','<?php echo $sem; ?>','<?php echo $course_id; ?>','<?php echo $question_id; ?>','<?php echo $y; ?>')">Temporary Skip</button>
                        <button id="save" name="save" type="submit" class="btn btn-success">Save & Next</button>
                      </div>
                    </div>
<?php 
      }
      else
      {
?>
        <p>Thanks for completing your test. To see the result click below.</p><br>
        <a href="result.php?test_id=<?php echo base64_encode($test_id);?>&subject_id=<?php echo base64_encode($subject_id);?>&course_id=<?php echo base64_encode($course_id);?>&sem=<?php echo base64_encode($sem);?>" class="btn btn-primary btn-xs">Show Result</a>
<?php   
      }
?>

                  </div><!--div reload end-->
                  </form>
                </div>
              </div>
              </div>


              <!--Data Tables-->
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="x_panel" align="center">

                  <div id="clockdiv">

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

    <!-- script for ajax -->
  <script type="text/javascript" src="js/test.js"></script>

    <!-- Datatables -->

    <script>
      $(document).ready(function() {
        $('#datatable').dataTable();
        $('#datatable-responsive').DataTable();
      });
    </script>
    <!-- /Datatables -->

    <!-- jquery code to change css -->
    <script type="text/javascript">
       $(".site_title").css({"font-size": "15px"});
    </script>

<script type="text/javascript">

 // switches to fullscreen mode on click on html body

addEventListener("click", function() {
    var
          el = document.documentElement
        , rfs =
               el.requestFullScreen
            || el.webkitRequestFullScreen
            || el.mozRequestFullScreen
    ;
    rfs.call(el);
});


// checks if the user closed the fullscreen mode or not

var count = 0;

if (document.addEventListener)
{
    document.addEventListener('webkitfullscreenchange', exitHandler, false);
    document.addEventListener('mozfullscreenchange', exitHandler, false);
    document.addEventListener('fullscreenchange', exitHandler, false);
    document.addEventListener('MSFullscreenChange', exitHandler, false);
}

function exitHandler()
{
    if (document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement != null)
    {
       
    }
    else
    {  
      count++;
      //alert(count);
    }
}


$("#body1").bind("contextmenu", function(e) {
    e.preventDefault();
});


    </script>


  </body>
</html>
<?php
    }
    else
    {
      header("Location: ../cpanel/");
    }
  }
}
?>
