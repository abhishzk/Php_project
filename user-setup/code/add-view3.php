<?php

include '../../config.php';


	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$user_type = $_POST['user_type'];
		$user_id = $_POST['user_id'];
		$user_pass = $_POST['user_pass'];
		$user_nm = $_POST['user_nm'];
		$user_add = $_POST['user_add'];
		$user_gender = $_POST['user_gender'];
		$user_email = $_POST['user_email'];
		$user_ph = $_POST['user_ph'];
		$lvl = $_POST['lvl'];

		$get = mysqli_query($conn,"SELECT * FROM user_dtls where user_id='$user_id'");

		$get2 = mysqli_query($conn,"SELECT * FROM user_dtls where user_ph='$user_ph'");

		$get3 = mysqli_query($conn,"SELECT * FROM user_dtls where user_email='$user_email'");

	    if($row = mysqli_fetch_array($get))
	    {  
	        echo "1";
	    }
	    elseif($row2 = mysqli_fetch_array($get2))
	    {
	    	echo "2";
	    }
	    elseif($row3 = mysqli_fetch_array($get3))
	    {
	    	echo "3";
	    }
	    else
	    {
	    	$stat = $very_stat = 1;
	    	$dp_pic = "user";
	    	$query = "INSERT INTO user_dtls (user_type,user_id,user_pass,user_nm,user_add,
	    	user_gender,user_email,user_ph, lvl,stat) VALUES ('$user_type','$user_id','$user_pass',
	    	'$user_nm','$user_add','$user_gender','$user_email','$user_ph','$lvl','$stat')";

		    $result = mysqli_query($conn,$query);


		    $query = "INSERT INTO login_tbl (u_id,full_nm,pass,stat,lvl,
	    	very_stat,image) VALUES ('$user_id','$user_nm','$user_pass','$stat','$lvl','$very_stat','$dp_pic')";

		    $result = mysqli_query($conn,$query);

		    echo "4";
	    }	
	}
	else
	{
		header("Location: ../add-view.php");
	}

?>