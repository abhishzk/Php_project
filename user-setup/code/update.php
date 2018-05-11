<?php

include '../../config.php';


	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$user_id = $_POST['user_id'];
		$user_nm = $_POST['user_nm'];
		$user_add = $_POST['user_add'];
		$user_email = $_POST['user_email'];
		$user_ph = $_POST['user_ph'];

		$get2 = mysqli_query($conn,"SELECT * FROM user_dtls where user_ph='$user_ph' and user_id!='$user_id'");

		$get3 = mysqli_query($conn,"SELECT * FROM user_dtls where user_email='$user_email' and user_id!='$user_id'");

		if($row2 = mysqli_fetch_array($get2))
	    {
	    	echo "1";
	    }
	    elseif($row3 = mysqli_fetch_array($get3))
	    {
	    	echo "2";
	    }
	    else
	    {
	    	$query_update = mysqli_query($conn,"UPDATE user_dtls set user_nm='$user_nm',user_add='$user_add',user_email='$user_email',user_ph='$user_ph' where user_id='$user_id'");

	    	$query_update2 = mysqli_query($conn,"UPDATE login_tbl set full_nm='$user_nm' where u_id='$user_id'");

	    	echo "3";
	    }

	}
	else
	{
		header("Location: ../update-delete.php");
	}

?>

