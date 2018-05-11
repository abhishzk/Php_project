<?php

include '../../config.php';


	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$course = $_POST['course'];
		$subject = $_POST['subject'];
		$teacher = $_POST['teacher'];
		$sem = $_POST['sem'];

		$stat = 1;

		$get = mysqli_query($conn,"SELECT * FROM assign_subject where course_id='$course' and semester_id='$sem' and subject_id='$subject' and teacher_id='$teacher' and stat='1'");

	    if($row = mysqli_fetch_array($get))
	    {  
	        echo "1";
	    }
	    else
	    {
		    $query = mysqli_query($conn,"INSERT INTO `assign_subject` (`sl`, `course_id`, `semester_id`, `subject_id`, `teacher_id`, `stat`) VALUES (NULL, '$course', '$sem', '$subject', '$teacher', '$stat')");

		    echo "2";
	    }	
	}
	else
	{
		header("Location: ../assign-subject.php");
	}

?>