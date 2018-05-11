<?php

include '../config.php';

if($ck==1)
{
	header("../cpanel/");
}
else
{
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		  $llg_in = date('d-m-Y h:i:s a', time());
	    $uid = $_POST['uid'];
	    $upass = $_POST['upass'];

        // To protect MySQL injection...
        $uid = stripslashes($uid);
        $upass = stripslashes($upass);
        $uid = mysqli_real_escape_string($conn,$uid);
        $upass = mysqli_real_escape_string($conn,$upass);

      //Checking Validation...
	    $get_valid3 = mysqli_query($conn,"SELECT * FROM login_tbl where BINARY u_id='$uid' and BINARY pass='$upass'");
    	$get_valid4 = mysqli_query($conn,"SELECT * FROM login_tbl where BINARY u_id='$uid' and BINARY pass='$upass' and stat='0'");

		      if($row_valid3 = mysqli_fetch_array($get_valid3))
          {
            if($row_valid4 = mysqli_fetch_array($get_valid4))
            {
              echo "2";
            }
            else
            {
                // send the the cookie if needed
              $get3 = mysqli_query($conn,"SELECT * FROM login_tbl where BINARY u_id='$uid'and BINARY pass='$upass' and stat='1'");
              if($row3 = mysqli_fetch_array($get3))
              {
                //$lvl_l=$row3['lvl'];
                $verify=$row3['very_stat'];
                if ($verify==1)
                {
                  session_start();
                  $_SESSION["pass"] = $upass;
                  $_SESSION["id"] = $uid;
                  //Advance Cookie code...for 1h
                  setcookie("rememberCookieUname", $uid, time() + (86400 * 30), "/");
                  setcookie("rememberCookiePassword", $upass, time() + (86400 * 30), "/");

                  $llg_in = date('d-m-Y h:i:s a', time());

                  $query = "UPDATE login_tbl SET llg_in='$llg_in' where u_id='$uid'";
                  $result = mysqli_query($conn,$query);

                  echo "1";
                }
              }
              else
              {
                echo "3";
              }
            }
          }
	}
}
?>