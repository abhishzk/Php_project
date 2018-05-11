<?php

include '../../config.php';


	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$course = $_POST['course'];
		$sem = $_POST['sem'];
		$student = $_POST['student'];
		$t_subject = $_POST['t_subject'];

		$stat = 1;

		$get = mysqli_query($conn,"SELECT * FROM student_setup where course_id='$course' and sem='$sem' and student_id='$student' and stat='1'");

	    if($row = mysqli_fetch_array($get))
	    {  
	        echo "1";
	    }
	    else
	    {
	    	if(is_array($t_subject))
	    	{
	    		$t_subject1 = implode(",",$t_subject);

	    		$query = mysqli_query($conn,"INSERT INTO `student_setup` (`sl`, `course_id`, `sem`, `subjects`, `student_id`, `stat`) VALUES (NULL, '$course', '$sem', '$t_subject1', '$student', '$stat')");

		    	echo "2";
	    	}
	    	else
	    	{
	    		echo "4";
	    	}
	    }	
	}
	else
	{
		header("Location: ../assign-student.php");
	}

?>