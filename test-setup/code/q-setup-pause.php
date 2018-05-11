<?php

include '../../config.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$test_id = $_POST['test_id'];
		$course_id = $_POST['course_id'];
		$subject_id = $_POST['subject_id'];

		$stat = 2;

		$query_update2 = mysqli_query($conn,"UPDATE q_temp set status='$stat' where teacher_id='$id1' and test_id='$test_id' and subject_id='$subject_id' and course_id='$course_id'");

		echo "1";
	}
	else
	{
		header("Location: ../question-setup.php");
	}

?>