<?php 

  include '../config.php';

?>

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <!-- <h3>Management</h3> -->
    <ul class="nav side-menu" >
      <li class=""><a href="../cpanel/"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <?php 
          if ($lvl_u == "-10" or $lvl_u == "1") 
          {
         ?>
      <li>
        <a><i class="fa fa-user"></i>Manage Accounts<span class="fa fa-chevron-down"></span></a>
        <?php 
          } 
        ?>
        <ul class="nav child_menu">
        <?php
          if ($lvl_u == "-10" or $lvl_u == "1") 
          {
          
        ?>
          <li><a href="../user-setup/add-view.php"><span class="fa fa-plus" aria-hidden="true"></span>Add / View Accounts</a></li>
          <li><a href="../user-setup/update-delete.php"><span class="fa fa-pencil" aria-hidden="true"></span>Edit / Delete Accounts</a></li>
        <?php
          }
        ?>
        </ul>
      </li>
        <?php 
          if ($lvl_u == "1")
          {
        ?>
      <li>
        <a><i class="fa fa-book"></i>Manage Subjects<span class="fa fa-chevron-down"></span></a>
        <?php 
          }
        ?>
        <ul class="nav child_menu">
        <?php
          if ($lvl_u == "1")
          {
        ?>
          <li><a href="../subject-setup/add-subject.php"><span class="fa fa-plus" aria-hidden="true"></span>Add / View Subjects</a></li>
          <li><a href="../subject-setup/assign-subject.php"><span class="fa fa-plus" aria-hidden="true"></span>Assign Subject to Teachers</a></li>
        <?php
          }
        ?>
        </ul>
      </li>
        <?php 
          if ($lvl_u == "1")
          {
        ?>
      <li>
        <a><i class="fa fa-book"></i>Manage Courses<span class="fa fa-chevron-down"></span></a>
        <?php 
          }
        ?>
        <ul class="nav child_menu">
        <?php
          if ($lvl_u == "1")
          {
        ?>
          <li><a href="../course-setup/assign-student.php"><span class="fa fa-plus" aria-hidden="true"></span>Assign Course to Students</a></li>
        <?php
          }
        ?>
        </ul>
      </li>
        <?php 
          if ($lvl_u == "1")
          {
        ?>
      <li><a><i class="fa fa-book"></i>Manage Tests<span class="fa fa-chevron-down"></span></a>
        <?php 
          }
        ?>
        <ul class="nav child_menu">
        <?php
          if ($lvl_u == "1")
          {
        ?>
          <li><a href="../test-setup/create-test.php"><span class="fa fa-plus" aria-hidden="true"></span>Create Test</a></li>
          <li><a href="../test-setup/build-test.php"><span class="fa fa-plus" aria-hidden="true"></span>Build Test</a></li>
        <?php
          }
        ?>
        </ul>
      </li>
    </ul>
    <!-- <h3>Services</h3> -->
    <!-- <ul class="nav side-menu" >
      <li class=""><a href="../user-tracker/"><i class="fa fa-map-marker"></i>Employee Tracker</a></li>
    </ul> -->
  </div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="fa fa-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="fa fa-desktop" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="fa fa-lock" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="../logout.php">
                <span class="fa fa-sign-out" aria-hidden="true"></span>
        </a>
    </div>
<!-- /menu footer buttons -->
