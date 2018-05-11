<?php

include '../../config.php';


	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$sub_nm = $_POST['sub_nm'];

		$subject = strtoupper($sub_nm);

		$get = mysqli_query($conn,"SELECT * FROM subject_dtls where subject_nm='$subject'");

	    if($row = mysqli_fetch_array($get))
	    {  
	        echo "1";
	    }
	    else
	    {

		    $query = "INSERT INTO subject_dtls (subject_nm) VALUES ('$subject')";
		    $result = mysqli_query($conn,$query);

		    echo "2";
	    }	
	}
	else
	{
		header("Location: ../add-subject.php");
	}

?>