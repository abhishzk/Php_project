<?php

include '../../config.php';


// code for generating random ID

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$user_type = $_POST['user_type'];

		if ($user_type == "1" or $user_type == "2") 
		{
			$random = substr(str_shuffle('012345678901234567890123456789012345678901234567890123456789') , 0 , 6 );

			echo $random;
		}
		else
		{
			$result = mysqli_query($conn,"SELECT * FROM user_dtls where lvl='5'");
      		$num_rows = mysqli_num_rows($result);
			$n = 0;
		      $l = "STUD";
		      if ($n == 9999) 
		      {
		        $n = 0;
		        $l++;
		      }
		      $id = $l . sprintf("%04d", $num_rows+1);
		      echo $id;
		}
		
	}
	else
	{
		header("Location: ../add-view.php");
	}

?>