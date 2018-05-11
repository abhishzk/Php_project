<?php

  include '../config.php';

  $get_user = mysqli_query($conn,"SELECT * FROM login_tbl where u_id = '$id1'");
  while($row_user = mysqli_fetch_array($get_user))
  {
    if ($row_user['image'] == "user") 
    {
      $image="user.png";
    }
    else
    {
      $image=$row_user['image'];
    }
  }

?>
<!-- top navigation -->
<div class="top_nav navbar-fixed-top">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="../images/<?php echo $image; ?>" alt=""><?php echo $name_u;?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
<?php 

          if ($lvl_u != "-10") 
          {

?>
            <li><a href="../profile-settings/profile.php"> Profile</a></li>
            <li><a href="../profile-settings/settings.php">Settings</a></li>
<?php

          }

?>
            <!-- <li><a href="javascript:;">Help</a></li> -->
            <li><a href="../logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>


      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->
