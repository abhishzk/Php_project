<?php

include '../config.php';

$stat = 1;

if (isset($_REQUEST['test_id'])) 
{
    $test_id = $_REQUEST['test_id'];
    $subject_id = $_REQUEST['subject_id'];
    $course_id = $_REQUEST['course_id'];

	$get_user = mysqli_query($conn,"SELECT * FROM q_temp where test_id='$test_id' and subject_id='$subject_id' and course_id='$course_id' and teacher_id='$id1' and status='$stat'");
    if($row_user = mysqli_fetch_array($get_user))
    {
    	header("Location: question-setup.php");
    }
    else
    {
		$query = "INSERT INTO q_temp (test_id,teacher_id,course_id,subject_id,status) VALUES ('$test_id','$id1','$course_id','$subject_id','$stat')";

		$result = mysqli_query($conn,$query);

		header("Location: question-setup.php");
	}
}
else
{
    header("Location: ../cpanel/");
}

 ?>