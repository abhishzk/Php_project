<?php

include '../../config.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$test_id = $_POST['test_id'];
		$course_id = $_POST['course_id'];
		$subject_id = $_POST['subject_id'];
		$question = $_POST['question'];
		$op1 = $_POST['op1'];
		$op2 = $_POST['op2'];
		$op3 = $_POST['op3'];
		$op4 = $_POST['op4'];
		$answer = $_POST['answer'];

		$stat = 1;

		$query = "INSERT INTO question_setup (test_id,teacher_id,course_id,subject_id,question,option_1,option_2,option_3,option_4,right_answer,q_status) VALUES ('$test_id','$id1','$course_id','$subject_id','$question','$op1','$op2','$op3','$op4','$answer','$stat')";
	    $result = mysqli_query($conn,$query);

		echo "1";
	}
	else
	{
		header("Location: ../question-setup.php");
	}

?>