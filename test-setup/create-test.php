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
    $error = $success = $msg = $type_danger = $title = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

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
    <title>Examination Portal - Create Test</title>

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

    <!-- Date Picker -->
    <link href="../css/jquery-ui.css" rel="stylesheet">

    <!-- Bootstrap Multi Select -->
     <link href="../css/bootstrap-multiselect.css" rel="stylesheet">
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
                <h3><i class="fa fa-cog"></i>&nbsp;Test Setup</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                  <h2>Test Creation<small>Fill the form to create a new test.</small></h2>
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

                  <form class="form-horizontal form-label-left" name="manage_subjects" id="manage_subjects" method="POST" action="code/create-test2.php" novalidate>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Test Name <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="test_nm" class="form-control col-md-7 col-xs-12" placeholder="e.g. MSC-IT TEST 1" name="test_nm" type="text" value="">
                        <span class="fa fa-book form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Question Submission Last Date <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="qsl_date" class="form-control col-md-7 col-xs-12" placeholder="" name="qsl_date" type="text" value="">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total No. of Questions <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="total_q" class="form-control col-md-7 col-xs-12" placeholder="e.g. 30" name="total_q" type="text" value="" onkeypress='return event.charCode >= 48 && event.charCode <= 57; validate(event)' maxlength="2" pattern="\d{2}">
                        <span class="fa fa-book form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Test Type <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control col-md-7 col-xs-12" id="test_type" name="test_type" required="required">
                          <option value="0">Choose Type</option>
                          <option value="1">MCQ</option>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Course<span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control col-md-7 col-xs-12" id="t_course" name="t_course" required="required">
                          <option value="0">Choose Course</option>
                          <?php
                            $get = mysqli_query($conn,"SELECT * FROM course_dtls");
                            while($row = mysqli_fetch_array($get))
                            {
                          ?>
                            <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_nm']; ?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Semester<span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control col-md-7 col-xs-12" id="sem" name="sem" required="required">
                          <option value="0">Choose Semester</option>
                          <option value="1">1st Semester</option>
                          <option value="2">2nd Semester</option>
                          <option value="3">3rd Semester</option>
                          <option value="4">4th Semester</option>
                          <option value="5">5th Semester</option>
                          <option value="6">6th Semester</option>
                          <option value="7">7th Semester</option>
                          <option value="8">8th Semester</option>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Subjects<span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control col-md-7 col-xs-12" id="t_subject" name="t_subject[]" required="required" multiple>
                          <?php
                            $get = mysqli_query($conn,"SELECT * FROM subject_dtls");
                            while($row = mysqli_fetch_array($get))
                            {
                          ?>
                            <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_nm']; ?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-lg-8 col-md-6 col-md-offset-3">
                        <button id="submit" name="submit" type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-primary">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              </div>

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
    <script src="../js/jquery-custom-msg.js"></script>

    <!-- Date Picker -->
    <script type="text/javascript" src="../js/jquery-ui.js"></script>

  <!-- Bootstrap Multi Select -->
  <script type="text/javascript" src="../js/bootstrap-multiselect.js"></script>

  <!-- script for ajax -->
  <script type="text/javascript" src="js/create-test.js"></script>
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


  </body>
</html>
<?php
  }
}
?>
