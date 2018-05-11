<?php

include '../../config.php';


// code for generating random password


	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$user_type = $_POST['user_type'];

		if ($user_type == "1" or $user_type == "2" or $user_type == "3") 
		{
			$random = substr(str_shuffle('0123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ@$&*') , 0 , 8 );

			echo $random;
		}
		
	}
	else
	{
		header("Location: ../add-view.php");
	}

?>