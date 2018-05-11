<?php
include '../config.php';

if($ck!=1)
{
  header("Location: ../login/");
}
else
{
  if ($lvl_u != "1" and $lvl_u != "-10")
  {
    header("Location: ../cpanel/");
  }
  else
  {
    $error = $success = $msg = $type_danger = $title = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $user_pass = $_POST['user_pass'];
      $user_nm = $_POST['user_nm'];
      $user_add = $_POST['user_add'];
      $user_gender = $_POST['user_gender'];
      $user_ph = $_POST['user_ph'];
      $user_email = $_POST['user_email'];
      $user_type = $_POST['user_type'];
      $submit = $_POST['submit'];
      $user_id = $_POST['user_id'];
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
    <title>Examination Portal - Add Account</title>

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
                <h3><i class="fa fa-cog"></i>&nbsp;Account Setup</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">
                  <h2>Add New Users <small>Fill the form to add new users.</small></h2>
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

                  <form class="form-horizontal form-label-left" name="add_user" id="add_user" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Type <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control col-md-7 col-xs-12" id="user_type" name="user_type" required="required">
                            <option value="0">Choose type</option>
                            <?php
                              if ($lvl_u == "-10") 
                              {                                    
                            ?>
                            <option value="1" <?php if(isset($_POST['submit'])){ if($_POST['user_type'] == '1') echo "selected";};?> >Moderator</option>
                            <option value="2" <?php if(isset($_POST['submit'])){ if($_POST['user_type'] == '2') echo "selected";};?> >Teacher</option>
                            <option value="3" <?php if(isset($_POST['submit'])){ if($_POST['user_type'] == '3') echo "selected";};?> >Student</option>
                            <?php
                              }
                              if ($lvl_u == "1") 
                              {       
                            ?>
                            <option value="2" <?php if(isset($_POST['submit'])){ if($_POST['user_type'] == '2') echo "selected";};?> >Teacher</option>
                            <option value="3" <?php if(isset($_POST['submit'])){ if($_POST['user_type'] == '3') echo "selected";};?> >Student</option>
                            <?php
                              }
                            ?>
                          </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Employee ID
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="user_id" class="form-control col-md-7 col-xs-12" readonly="readonly" name="user_id" type="text" value="">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="user_pass" class="form-control col-md-7 col-xs-12" placeholder="e.g. Pass@12345" name="user_pass" type="password" value="" readonly="readonly">
                        <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Full Name <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input id="user_nm" class="form-control col-md-7 col-xs-12" placeholder="e.g. First Last" name="user_nm" type="text" value="">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <textarea id="user_add" name="user_add" class="form-control col-md-7 col-xs-12"></textarea>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="radio" name="user_gender" id="user_gender" value="1"> Male &nbsp;
                        <input type="radio" name="user_gender" id="user_gender2" value="2"> Female
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone <span class="required">*</span></label>
                        <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57; validate(event)' maxlength="10" id="user_ph" name="user_ph" value="">
                          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="user_email" name="user_email"  class="form-control col-md-7 col-xs-12" value="">
                        <span class="fa fa-paper-plane form-control-feedback right" aria-hidden="true"></span>
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
                  <h2>Users List</h2>
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
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $s_i=0;

                      if ($lvl_u == "-10")
                      {
                        $get_user = mysqli_query($conn,"SELECT * FROM user_dtls where stat = '1'");
                      }

                      if ($lvl_u == "1")
                      {
                        $get_user = mysqli_query($conn,"SELECT * FROM user_dtls where stat = '1' and lvl!='1'");
                      }
                      
                      while($row_user=mysqli_fetch_array($get_user))
                      {
                        $s_i++;
                        $user_get_sl=$row_user['sl'];
                        $user_get_id=$row_user['user_id'];
                        $user_get_nm=$row_user['user_nm'];
                        $user_get_type=$row_user['user_type'];
                        $user_get_add=$row_user['user_add'];
                        $user_get_ph=$row_user['user_ph'];
                        $user_get_email=$row_user['user_email'];

                        $type = "";

                        if($user_get_type == 1)
                        {
                          $type = "Moderator";
                        }
                        elseif($user_get_type == 2)
                        {
                          $type = "Teacher";
                        }
                        else
                        {
                          $type = "Student";
                        }
                      ?>
                      <tr>
                        <td><?php echo $s_i;?></td>
                        <td><?php echo $user_get_id;?></td>
                        <td><?php echo $user_get_nm;?></td>
                        <td><?php echo $type;?></td>
                        <td><?php echo $user_get_add;?></td>
                        <td><?php echo $user_get_ph;?></td>
                        <td><?php echo $user_get_email;?></td>
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
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->
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

	<script type="text/javascript" src="js/add-view.js"></script>


  </body>
</html>
<?php
  }
}
?>
