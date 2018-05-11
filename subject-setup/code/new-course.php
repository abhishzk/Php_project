<?php

include '../../config.php';


	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$c_nm = $_POST['c_nm'];

		$course = strtoupper($c_nm);

		$course = str_replace(' ', '', $course);

		$get = mysqli_query($conn,"SELECT * FROM course_dtls where course_nm='$course'");

	    if($row = mysqli_fetch_array($get))
	    {  
	        echo "1";
	    }
	    else
	    {

		    $query = "INSERT INTO course_dtls (course_nm) VALUES ('$course')";
		    $result = mysqli_query($conn,$query);

		    echo "2";
	    }	
	}
	else
	{
		header("Location: ../assign-subject.php");
	}

?>