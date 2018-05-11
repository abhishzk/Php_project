<?php
include '../config.php';

$one = 1;

$get = mysqli_query($conn,"SELECT * FROM q_temp where teacher_id='$id1' and status='1'");
if($row = mysqli_fetch_array($get))
{
    // header("Location: ../cPanel/");

    $get = mysqli_query($conn,"SELECT * FROM q_temp where teacher_id='$id1' and status='1'");
    while($row = mysqli_fetch_array($get))
    {
      $test_id = $row['test_id'];
      $course_id = $row['course_id'];
      $subject_id = $row['subject_id'];
    }

    $get2 = mysqli_query($conn,"SELECT * FROM create_test where test_id='$test_id'");
    while($row2 = mysqli_fetch_array($get2))
    {
      $test_nm = $row2['test_nm'];
    }

    $get3 = mysqli_query($conn,"SELECT * FROM subject_dtls where subject_id='$subject_id'");
    while($row3 = mysqli_fetch_array($get3))
    {
      $subject_nm = $row3['subject_nm'];
    }

    $get4 = mysqli_query($conn,"SELECT * FROM course_dtls where course_id='$course_id'");
    while($row4 = mysqli_fetch_array($get4))
    {
      $course_nm = $row4['course_nm'];
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
    <title>Examination Portal - Question Setup</title>

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

    <script type="text/javascript">
      function fileExport(tid,cid,sid,one)
      {
        setTimeout(function(){
          $('#light_box').load('modal/export.php?tid='+tid+'&cid='+cid+'&sid='+sid+'&one='+one).fadeIn("fast"); /*Modal Content Load from page location*/
          $('#lightbox_modal').modal('show'); /* Loaded Modal Show*/
        }, 100);
      }
    </script>
  </head>

  <body class="nav-md">
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
                <h3><i class="fa fa-cog"></i>&nbsp;Question Setup</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                  <h2>Add New Questions <small>Fill the form to add new questions.</small></h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <form class="form-horizontal form-label-left" name="add_user" id="add_user" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Test Name <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="t_nm" class="form-control col-md-7 col-xs-12" readonly="readonly" name="t_nm" type="text" value="<?php echo $test_nm;?>">
                        <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Course Name <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="c_nm" class="form-control col-md-7 col-xs-12" readonly="readonly" name="c_nm" type="text" value="<?php echo $course_nm;?>">
                        <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Subject Name <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="s_nm" class="form-control col-md-7 col-xs-12" readonly="readonly" name="s_nm" type="text" value="<?php echo $subject_nm;?>">
                        <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Question <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <textarea id="question" name="question" class="form-control col-md-7 col-xs-12"></textarea>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Option 1 <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="op1" class="form-control col-md-7 col-xs-12" name="op1" type="text" value="">
                        <span class="fa fa-pencil form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Option 2 <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="op2" class="form-control col-md-7 col-xs-12" name="op2" type="text" value="">
                        <span class="fa fa-pencil form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>    
                    
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Option 3 <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="op3" class="form-control col-md-7 col-xs-12" name="op3" type="text" value="">
                        <span class="fa fa-pencil form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>                    
                    
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Option 4 <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="op4" class="form-control col-md-7 col-xs-12" name="op4" type="text" value="">
                        <span class="fa fa-pencil form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>                    
                    
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Right Answer <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="answer" class="form-control col-md-7 col-xs-12" name="answer" type="text" value="" placeholder="@ example : 1" maxlength="1" onkeypress='return event.charCode >= 48 && event.charCode <= 57; validate(event)'>
                        <span class="fa fa-pencil form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>                
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-lg-8 col-md-6 col-md-offset-3">
                      
                        <button id="submit" name="submit" type="button" class="btn btn-success">Submit</button>
                        <button id="pause" name="pause" type="button" class="btn btn-danger">Pause</button>
                        <button id="complete" name="complete" type="button" class="btn btn-primary">Complete</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              </div>
              <input type="hidden" name="test_id" id="test_id" value="<?php echo $test_id; ?>">
              <input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id; ?>">
              <input type="hidden" name="subject_id" id="subject_id" value="<?php echo $subject_id; ?>">

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

    <!-- Datatables -->
    <script src="../js/jquery.dataTables.js"></script>
    <!--<script src="../js/dataTables.bootstrap.js"></script>--> <!--NOTE :this file displaces the table search field-->
    <script src="../js/dataTables.responsive.js"></script>
    <script src="../js/responsive.bootstrap.js"></script>
    <script src="../js/jquery-custom-msg.js"></script>
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        $('#datatable').dataTable();
        $('#datatable-responsive').DataTable();
      });
    </script>
    <!-- /Datatables -->
    <!--Error Fade Out-->
    <script>
      $(document).ready(function(){
        $("#msg").fadeOut(8000);
      });
    </script>
    <!--Error Fade Out-->

    <!-- jquery code to change css -->
    <script type="text/javascript">
       $(".site_title").css({"font-size": "15px"});
    </script>


    <!-- script for ajax -->

	<script type="text/javascript" src="js/question-setup.js"></script>

  </body>
</html>

<?php 

}

else
{
  header("Location: ../cpanel/");
}
 ?>