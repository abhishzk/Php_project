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
    <title>Examination Portal - Add Subject</title>

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
                <h3><i class="fa fa-cog"></i>&nbsp;Subject Creation</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                  <h2>Add New Subjects<small>Fill the form to add new subjects.</small></h2>
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

                  <form class="form-horizontal form-label-left" name="add_subject" id="add_subject" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Subject Name <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="sub_nm" class="form-control col-md-7 col-xs-12" placeholder="e.g. Web Technologies" name="sub_nm" type="text" value="<?php echo isset($_POST['sub_nm']) ? $_POST['sub_nm'] : '';?>">
                        <span class="fa fa-book form-control-feedback right" aria-hidden="true"></span>
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

              <!--Data Tables-->
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Subjects List</h2>
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
                        <th>Subject Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $s_i=0;
                      $get_user=mysqli_query($conn,"SELECT * FROM subject_dtls Limit 20");
                      while($row_user=mysqli_fetch_array($get_user))
                      {
                        $s_i++;
                        $subject_id=$row_user['subject_id'];
                        $subject_nm=$row_user['subject_nm'];
                      ?>
                      <tr>
                        <td><?php echo $s_i;?></td>
                        <td><?php echo $subject_nm;?></td>
                      </tr>
                      <?php
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
    <script src="../js/jquery-custom-msg.js"></script>

    <!-- script for ajax -->
  <script type="text/javascript" src="js/add-subject.js"></script>

    <!-- Datatables -->

    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>

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


  </body>
</html>
<?php
  }
}
?>
