<?php

include '../../config.php';


	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$id = $_POST['uid'];
		$z = $_POST['z'];

	  //   $query = "DELETE from user_dtls where user_id='$id'";
 		// $result = mysqli_query($conn, $query);

 		// $query2 = "DELETE from login_tbl where u_id='$id'";
 		// $result2 = mysqli_query($conn, $query2);

 		if ($z=="0") 
 		{
 			$query_update = mysqli_query($conn,"UPDATE user_dtls set stat='0' where user_id='$id'");

 			$query_update2 = mysqli_query($conn,"UPDATE login_tbl set stat='0' where u_id='$id'");

 			echo "1";
 		}
 		else
 		{
 			$query_update = mysqli_query($conn,"UPDATE user_dtls set stat='1' where user_id='$id'");

 			$query_update2 = mysqli_query($conn,"UPDATE login_tbl set stat='1' where u_id='$id'");

 			echo "2"; 			
 		}
 		
	}
	else
	{
		header("Location: ../update-delete.php");
	}

?>

