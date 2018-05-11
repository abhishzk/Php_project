<?php
include '../../config.php';

error_reporting(E_ALL & ~E_NOTICE);

$test_id = $_REQUEST['t_id'];
$subject_id = $_REQUEST['s_id'];
$sem = $_REQUEST['sem'];
$course_id = $_REQUEST['c_id'];
$question_id = $_REQUEST['q_id'];
$v = $_REQUEST['v'];

$user_id = $id1;

$option = $_REQUEST['option'];




  $get_test74 = mysqli_query($conn,"SELECT * FROM final_questions where test_id='$test_id' and sl='$question_id' and subject_id='$subject_id' and course_id='$course_id'");
  while($row_test74 = mysqli_fetch_array($get_test74))
  {
    $right_answer = $row_test74['right_answer'];
  }


/*Only Check and insert or Update against button click*/

if ($v==1) /*Skip Button*/
{
  $get_test33 = mysqli_query($conn,"SELECT * FROM test where test_id='$test_id' and question_id='$question_id' and subject_id='$subject_id' and course_id='$course_id' and sem_id='$sem'");
  if($row_test33 = mysqli_fetch_array($get_test33))
  {
    $query_update2 = mysqli_query($conn,"UPDATE test set status='1' where test_id='$test_id' and question_id='$question_id' and subject_id='$subject_id' and course_id='$course_id' and sem_id='$sem'");
  }
  else
  {
    $query_insert = "INSERT INTO test (test_id,question_id,course_id,sem_id,subject_id,student_id,status) VALUES ('$test_id','$question_id','$course_id','$sem','$subject_id','$id1','1')";
    $result_insert = mysqli_query($conn,$query_insert);
  }
}

if ($v==2) /*Temporary Skip Button*/
{
  $get_test33 = mysqli_query($conn,"SELECT * FROM test where test_id='$test_id' and question_id='$question_id' and subject_id='$subject_id' and course_id='$course_id' and sem_id='$sem'");
  if($row_test33 = mysqli_fetch_array($get_test33))
  {
    $query_update2 = mysqli_query($conn,"UPDATE test set status='2' where test_id='$test_id' and question_id='$question_id' and subject_id='$subject_id' and course_id='$course_id' and sem_id='$sem'");
  }
  else
  {
    $query_insert = "INSERT INTO test (test_id,question_id,course_id,sem_id,subject_id,student_id,status) VALUES ('$test_id','$question_id','$course_id','$sem','$subject_id','$id1','2')";
    $result_insert = mysqli_query($conn,$query_insert);
  }
}

if ($v==3) /*Save & Next Button*/
{
  $query_insert = "INSERT INTO answer (test_id, course_id, subject_id, sem, question_id, student_id, student_answer, right_answer) VALUES ('$test_id','$course_id','$subject_id','$sem','$question_id','$id1','$option','$right_answer')";
    $result_insert = mysqli_query($conn,$query_insert);


  $get_test33 = mysqli_query($conn,"SELECT * FROM test where test_id='$test_id' and question_id='$question_id' and subject_id='$subject_id' and course_id='$course_id' and sem_id='$sem'");
  if($row_test33 = mysqli_fetch_array($get_test33))
  {
    $query_update2 = mysqli_query($conn,"UPDATE test set status='3' where test_id='$test_id' and question_id='$question_id' and subject_id='$subject_id' and course_id='$course_id' and sem_id='$sem'");
  }
  else
  {
    $query_insert = "INSERT INTO test (test_id,question_id,course_id,sem_id,subject_id,student_id,status) VALUES ('$test_id','$question_id','$course_id','$sem','$subject_id','$id1','3')";
    $result_insert = mysqli_query($conn,$query_insert);
  }

}



$get_test3 = mysqli_query($conn,"SELECT * FROM create_test where test_id='$test_id'");
if($row_test3 = mysqli_fetch_array($get_test3))
{
  $tnq = $row_test3['total_no_questions'];
}

    $status = 1; $x = 1; $y = 2; $z = 3; $c = 0; $r = 0;

    $sql = mysqli_query($conn,"SELECT * FROM test where test_id='$test_id' and subject_id='$subject_id' and course_id='$course_id' and sem_id='$sem' and student_id='$id1'");
    while ($row2 = mysqli_fetch_array($sql)) 
    {
      $r++;
    }

    if ($r < $tnq) 
    {
      aa:

      $get_test2 = mysqli_query($conn,"SELECT * FROM final_questions where test_id='$test_id' and subject_id='$subject_id' and q_status='1' ORDER BY RAND() LIMIT 1");
      if($row_test2 = mysqli_fetch_array($get_test2))
      {
        $question_id = $row_test2['sl'];
        $test_question = $row_test2['question'];
        $test_option1 = $row_test2['option_1'];
        $test_option2 = $row_test2['option_2'];
        $test_option3 = $row_test2['option_3'];
        $test_option4 = $row_test2['option_4'];
        $test_right_answer = $row_test2['right_answer'];


        $sql6 = mysqli_query($conn,"SELECT * FROM test where test_id='$test_id' and subject_id='$subject_id' and course_id='$course_id' and sem_id='$sem' and student_id='$id1' and question_id='$question_id'");
      if ($row6 = mysqli_fetch_array($sql6))
      {
        $question_stat = $row6['status'];
        if ($question_stat==2) 
        {
          ?>
            <input type="hidden" name="test_sl" id="test_sl" value="<?php echo $question_id; ?>">

            <div class="item form-group">
              <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <p class="" id="test_question" name="test_question" type="text"><?php echo $test_question; ?></p>
              </div>
            </div>

            <div class="item form-group">
              <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <input type="radio" name="ans" id="option1" value="1"> <?php echo $test_option1; ?> <br>
                <input type="radio" name="ans" id="option2" value="2"> <?php echo $test_option2; ?> <br>
                <input type="radio" name="ans" id="option3" value="3"> <?php echo $test_option3; ?> <br>
                <input type="radio" name="ans" id="option4" value="4"> <?php echo $test_option4; ?>
              </div>
            </div>


<div class="ln_solid"></div>
<div class="form-group">
  <div align="center" class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
    <button id="skip" name="skip" type="button" class="btn btn-danger" onclick="divReload('<?php echo $test_id; ?>','<?php echo $subject_id; ?>','<?php echo $sem; ?>','<?php echo $course_id; ?>','<?php echo $question_id; ?>','<?php echo $x; ?>')">Skip</button>
    <button id="t_skip" name="t_skip" type="button" class="btn btn-primary" onclick="divReload('<?php echo $test_id; ?>','<?php echo $subject_id; ?>','<?php echo $sem; ?>','<?php echo $course_id; ?>','<?php echo $question_id; ?>','<?php echo $y; ?>')">Temporary Skip</button>
    <button id="save" name="save" type="submit" class="btn btn-success">Save & Next</button>
  </div>
</div>
          <?php
        }
        else
        {
          goto aa;
        }
      }
      else
      {
        ?>
<input type="hidden" name="test_sl" id="test_sl" value="<?php echo $question_id; ?>">


            <div class="item form-group">
              <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <p class="" id="test_question" name="test_question" type="text"><?php echo $test_question; ?></p>
              </div>
            </div>

            <div class="item form-group">
              <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <input type="radio" name="ans" id="option1" value="1"> <?php echo $test_option1; ?> <br>
                <input type="radio" name="ans" id="option2" value="2"> <?php echo $test_option2; ?> <br>
                <input type="radio" name="ans" id="option3" value="3"> <?php echo $test_option3; ?> <br>
                <input type="radio" name="ans" id="option4" value="4"> <?php echo $test_option4; ?>
              </div>
            </div>


<div class="ln_solid"></div>
<div class="form-group">
  <div align="center" class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
    <button id="skip" name="skip" type="button" class="btn btn-danger" onclick="divReload('<?php echo $test_id; ?>','<?php echo $subject_id; ?>','<?php echo $sem; ?>','<?php echo $course_id; ?>','<?php echo $question_id; ?>','<?php echo $x; ?>')">Skip</button>
    <button id="t_skip" name="t_skip" type="button" class="btn btn-primary" onclick="divReload('<?php echo $test_id; ?>','<?php echo $subject_id; ?>','<?php echo $sem; ?>','<?php echo $course_id; ?>','<?php echo $question_id; ?>','<?php echo $y; ?>')">Temporary Skip</button>
    <button id="save" name="save" type="submit" class="btn btn-success">Save & Next</button>
  </div>
</div>
          <?php

      }

      }
    }
    else
    {
      $sql_get_t = mysqli_query($conn,"SELECT * FROM test where test_id='$test_id' and subject_id='$subject_id' and course_id='$course_id' and sem_id='$sem' and student_id='$id1' and status=2 ORDER BY RAND() LIMIT 1");
      if ($row_sql_get_t = mysqli_fetch_array($sql_get_t)) 
      {
        $question_id = $row_sql_get_t['question_id'];

        $get_test2 = mysqli_query($conn,"SELECT * FROM final_questions where sl='$question_id'");
        if($row_test2 = mysqli_fetch_array($get_test2))
        {
          $question_id = $row_test2['sl'];
          $test_question = $row_test2['question'];
          $test_option1 = $row_test2['option_1'];
          $test_option2 = $row_test2['option_2'];
          $test_option3 = $row_test2['option_3'];
          $test_option4 = $row_test2['option_4'];
          $test_right_answer = $row_test2['right_answer'];

          ?>
          <input type="hidden" name="test_sl" id="test_sl" value="<?php echo $question_id; ?>">
            <div class="item form-group">
              <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <p class="" id="test_question" name="test_question" type="text"><?php echo $test_question; ?></p>
              </div>
            </div>

            <div class="item form-group">
              <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <input type="radio" name="ans" id="option1" value="1"> <?php echo $test_option1; ?> <br>
                <input type="radio" name="ans" id="option2" value="2"> <?php echo $test_option2; ?> <br>
                <input type="radio" name="ans" id="option3" value="3"> <?php echo $test_option3; ?> <br>
                <input type="radio" name="ans" id="option4" value="4"> <?php echo $test_option4; ?>
              </div>
            </div>


<div class="ln_solid"></div>
<div class="form-group">
  <div align="center" class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
    <button id="skip" name="skip" type="button" class="btn btn-danger" onclick="divReload('<?php echo $test_id; ?>','<?php echo $subject_id; ?>','<?php echo $sem; ?>','<?php echo $course_id; ?>','<?php echo $question_id; ?>','<?php echo $x; ?>')">Skip</button>
    <button id="t_skip" name="t_skip" type="button" class="btn btn-primary" onclick="divReload('<?php echo $test_id; ?>','<?php echo $subject_id; ?>','<?php echo $sem; ?>','<?php echo $course_id; ?>','<?php echo $question_id; ?>','<?php echo $y; ?>')">Temporary Skip</button>
    <button id="save" name="save" type="submit" class="btn btn-success">Save & Next</button>
  </div>
</div>
          <?php
        }
      }
      else
      {
?>
        <p>Thanks for completing your test. To see the result click below.</p><br>
        <a href="result.php?test_id=<?php echo base64_encode($test_id);?>&subject_id=<?php echo base64_encode($subject_id);?>&course_id=<?php echo base64_encode($course_id);?>&sem=<?php echo base64_encode($sem);?>" class="btn btn-primary btn-xs">Show Result</a>
<?php  
      }

    }

 ?>

<!-- script for ajax -->
  <script type="text/javascript" src="js/test.js"></script>

      