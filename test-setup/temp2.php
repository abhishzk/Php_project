<?php

include '../config.php';

$stat = 1;

if (isset($test_id)) 
{
	$test_id = $_REQUEST['test_id'];
	$subject_id = $_REQUEST['subject_id'];
	$course_id = $_REQUEST['course_id'];
	
	$get_user = mysqli_query($conn,"SELECT * FROM q_temp where test_id='$test_id' and subject_id='$subject_id' and course_id='$course_id' and teacher_id='$id1' and status='2'");

	if($row_user = mysqli_fetch_array($get_user))
    {
    	$query_update2 = mysqli_query($conn,"UPDATE q_temp set status='$stat' where teacher_id='$id1' and test_id='$test_id' and subject_id='$subject_id' and course_id='$course_id'");

		header("Location: question-setup.php");
	}
}
else
{
    header("Location: ../cpanel/");
}


 ?>