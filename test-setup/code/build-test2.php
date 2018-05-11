<?php

include '../../config.php';


	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$total_q = $_POST['total_q'];
		$test_date = $_POST['test_date'];
		$ts_time = $_POST['ts_time'];
		$te_time = $_POST['te_time'];
		$tid = $_POST['tid'];
		$tsd = $_POST['tsd'];
		$tcd = $_POST['tcd'];
		$sem = $_POST['sem'];

		$stat = 1;

		$query_update = mysqli_query($conn,"UPDATE create_test set test_stat='2' where test_id='$tid'");

		$query_insert = mysqli_query($conn,"INSERT INTO test_dtls (sl, test_id, test_course, test_semester, test_subject, test_date, test_start_time, test_end_time, test_stat) VALUES (NULL, '$tid', '$tcd', '$sem', '$tsd', '$test_date', '$ts_time', '$te_time', '$stat')");

		$get = mysqli_query($conn,"SELECT * FROM question_setup where test_id='$tid' and subject_id='$tsd' and course_id='$tcd' ORDER BY RAND() LIMIT $total_q");
		while ($row = mysqli_fetch_array($get)) 
		{
			$sl = $row['sl'];
			$test_id = $row['test_id'];
			$teacher_id = $row['teacher_id'];
			$course_id = $row['course_id'];
			$subject_id = $row['subject_id'];
			$question = $row['question'];
			$op1 = $row['option_1'];
			$op2 = $row['option_2'];
			$op3 = $row['option_3'];
			$op4 = $row['option_4'];
			$right_answer = $row['right_answer'];
			$q_status = $row['q_status'];

			$query = mysqli_query($conn,"INSERT INTO final_questions (sl, test_id, course_id, subject_id, question, option_1, option_2, option_3, option_4, right_answer, q_status) VALUES (NULL, '$test_id', '$course_id', '$subject_id', '$question', '$op1', '$op2', '$op3', '$op4', '$right_answer', '$q_status')");
		}

		echo "1";

	}
	else
	{
		header("Location: ../build-test.php");
	}

?>

