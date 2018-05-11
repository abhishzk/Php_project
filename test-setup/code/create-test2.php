<?php
	include '../../config.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$test_nm = $_POST['test_nm'];
		$qsl_date = $_POST['qsl_date'];
		$total_q = $_POST['total_q'];
		$test_type = $_POST['test_type'];
		$t_course = $_POST['t_course'];
		$t_subject = $_POST['t_subject'];
		$sem = $_POST['sem'];

		$test_nm2 = strtoupper($test_nm);
		$test_nm3 = str_replace(' ', '_', $test_nm2);

		$test_stat = 1;

		$test_type = strtoupper($test_type);

		/*Generate Test ID*/
		$result = mysqli_query($conn,"SELECT * FROM create_test");
    	$num_rows = mysqli_num_rows($result);
		$n = 0;
		$l = "TEST";
		if ($n == 9999)
		{
			$n = 0;
		  $l++;
		}
		$test_id = $l . sprintf("%04d", $num_rows+1);
		

		$get_valid = mysqli_query($conn,"SELECT * FROM `create_test` WHERE test_nm='$test_nm3' AND test_stat=1");
		$get_valid1 = mysqli_query($conn,"SELECT * FROM `create_test` WHERE test_course='$t_course' and test_sem='$sem' and test_stat=1");

	  if($row_valid = mysqli_fetch_array($get_valid))
	  {
	    echo "1";
	  }
	  elseif($row_valid1 = mysqli_fetch_array($get_valid1))
	  {
			echo "2";
	  }
	  else
	  {
			if(is_array($t_subject))
			{
				//to insert an array data into the database..
        $t_subject1 = implode(",",$t_subject);

				$query = mysqli_query($conn,"INSERT INTO `create_test` (`sl`, `test_id`, `test_nm`, `question_submission_last_dt`, `total_no_questions`, `test_type`, `test_course`, `test_sem`, `test_subjects`, `test_stat`) VALUES (NULL, '$test_id', '$test_nm3', '$qsl_date', '$total_q', '$test_type', '$t_course', '$sem', '$t_subject1', '$test_stat')");

				echo "3";
			}
			else
			{
				echo "4";
			}
		}
	}
	else
	{
		header("Location: ../create_test.php");
	}

?>
