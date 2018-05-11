<?php

include '../../config.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$test_id = $_POST['test_id'];
		$course_id = $_POST['course_id'];
		$subject_id = $_POST['subject_id'];

		$get2 = mysqli_query($conn,"SELECT * FROM create_test where test_id='$test_id'");
	    while($row2 = mysqli_fetch_array($get2))
	    {
	      $tnq = $row2['total_no_questions'];
	    }


	    $get = mysqli_query($conn,"SELECT * FROM question_setup where teacher_id='$id1' and test_id='$test_id' and subject_id='$subject_id' and course_id='$course_id' and q_status='1'");
	    $row = mysqli_num_rows($get);
	

	    if ($tnq <= $row) 
	    {
	    	$stat = 0;

			$query_update2 = mysqli_query($conn,"UPDATE q_temp set status='$stat' where teacher_id='$id1' and test_id='$test_id' and subject_id='$subject_id' and course_id='$course_id'");

			echo "1";
	    }
	    else
	    {
	    	echo "2";
	    }
		
	}
	else
	{
		header("Location: ../question-setup.php");
	}

?>