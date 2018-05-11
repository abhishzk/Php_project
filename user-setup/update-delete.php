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
    <title>Examination Portal</title>

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
      /* Modal Opening JS */
      function funDeact(id)
      {
        setTimeout(function(){
          $('#light_box').load('modal/deactive-modal.php?uid='+id); /*Modal Content Load from page location*/
          $('#lightbox_modal').modal('show'); /* Loaded Modal Show*/
        }, 100);
      }
      function funAct(id)
      {
        setTimeout(function(){
          $('#light_box').load('modal/active-modal.php?uid='+id); /*Modal Content Load from page location*/
          $('#lightbox_modal').modal('show'); /* Loaded Modal Show*/
        }, 100);
      }
      function funUpdate(id)
      {
        setTimeout(function(){
          $('#light_box').load('modal/update-modal.php?uid='+id); /*Modal Content Load from page location*/
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
                <h3><i class="fa fa-cog"></i>&nbsp;Users</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!--Data Tables-->
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Registerd Users</h2>
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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $s_i=0;

                      if ($lvl_u == "-10")
                      {
                        $get_user = mysqli_query($conn,"SELECT * FROM user_dtls order by stat desc");
                      }

                      if ($lvl_u == "1")
                      {
                        $get_user = mysqli_query($conn,"SELECT * FROM user_dtls where lvl!='1' order by stat desc");
                      }
                      
                      while($row_user = mysqli_fetch_array($get_user))
                      {
                        $s_i++;
                        $user_get_sl=$row_user['sl'];
                        $user_get_id=$row_user['user_id'];
                        $user_get_nm=$row_user['user_nm'];
                        $user_get_type=$row_user['user_type'];
                        $user_get_add=$row_user['user_add'];
                        $user_get_ph=$row_user['user_ph'];
                        $user_get_email=$row_user['user_email'];
                        $user_get_stat=$row_user['stat'];

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
                        <td align="center">

                        <a href="javascript:void(0);" class="btn btn-primary btn-xs" onclick="funUpdate('<?php echo $user_get_id;?>')">Update</a> 
                        <?php if ($user_get_stat=="1") 
                              {
                        ?>
                        <a href="javascript:void(0);" class="btn btn-danger btn-xs" onclick="funDeact('<?php echo $user_get_id;?>')">Deactivate</a>
                        <?php
                              }
                              else
                              {
                        ?>
                        <a href="javascript:void(0);" class="btn btn-danger btn-xs" onclick="funAct('<?php echo $user_get_id;?>')">Activate</a>
                        <?php
                              }
                        ?>

                        </td>
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
    <script src="../js/dataTables.bootstrap.js"></script> <!--NOTE :this file displaces the table search field-->
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
       $(".modal-body").css({"font-size": "15px"});
    </script>

  </body>
</html>
<?php
  }
}
?>
