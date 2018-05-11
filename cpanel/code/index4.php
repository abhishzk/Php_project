<?php 

include '../../config.php';

  date_default_timezone_set('Asia/Kolkata');
  $date = date('d-m-Y') ;
  $time = date('H:i');

 ?>

          <div class="" style="margin-top:50px;">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-cog"></i>&nbsp;Test Details</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!--Data Tables-->
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Test Notifications</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Test ID</th>
                        <th>Test Name</th>
                        <th>Test Type</th>
                        <th>Test Course</th>
                        <th>Test Semester</th>
                        <th>Test Subject</th>
                        <th>Test Date</th>
                        <th>Test Start Time</th>
                        <th>Test End Time</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                    $s_i=$d=$t=0;

                $get_stud = mysqli_query($conn,"SELECT * FROM student_setup where student_id='$id1' and stat='1'");
        				while($row_stud = mysqli_fetch_array($get_stud))
        				{
        				  $course_id2 = $row_stud['course_id'];
        				  $sem = $row_stud['sem'];

                          if ($sem == 1) 
                          {
                            $semester = $sem . "st";
                          }
                          elseif ($sem == 2) 
                          {
                            $semester = $sem . "nd";
                          }
                          elseif ($sem == 3) 
                          {
                            $semester = $sem . "rd";
                          }
                          else 
                          {
                            $semester = $sem . "th";
                          }     

        				  $subjects = explode(",", $row_stud['subjects']);
        				  foreach($subjects as $sub) 
        				  { $s_i++;
        				    $sub = trim($sub);
        				    
        				    $get_test2 = mysqli_query($conn,"SELECT * FROM test_dtls where test_course='$course_id2' and test_semester='$sem' and test_subject='$sub' and test_stat='1'");
        				    while($row_test2 = mysqli_fetch_array($get_test2))
        				    {
        				      $test_id2 = $row_test2['test_id'];
        				      $test_subject = $row_test2['test_subject'];
        				      $test_date = $row_test2['test_date'];
        				      $test_start_time = $row_test2['test_start_time'];
        				      $test_end_time = $row_test2['test_end_time'];

                        $timestamp = strtotime($test_start_time) + 60*30/2; //15Min
                        $vtm = date('H:i', $timestamp);

        				    if (strtotime($date) == strtotime($test_date))
        				    {
        				        $d = 1;
        				    }

        				    if (date("H:i")<date("H:i",strtotime($vtm)))
        				    {
        				        $t = 1;

        				    }
        				      $get2 = mysqli_query($conn,"SELECT * FROM create_test where test_id='$test_id2'");
        				      while($row2 = mysqli_fetch_array($get2))
        				      {
        				        $t_nm = $row2['test_nm'];
        				        $t_type = $row2['test_type'];
        				      }

        				      $get2 = mysqli_query($conn,"SELECT * FROM course_dtls where course_id='$course_id2'");
        				      while($row2 = mysqli_fetch_array($get2))
        				      {
        				        $course = $row2['course_nm'];
        				      }

        				      $get2 = mysqli_query($conn,"SELECT * FROM subject_dtls where subject_id='$sub'");
                      while($row2 = mysqli_fetch_array($get2))
                      {
                        $subject=$row2['subject_nm'];
                      }

        				      if ($t_type == '1')
        				      {
        				      	$t_type = "MCQ";
        				      }

                        $get_user = mysqli_query($conn,"SELECT * FROM answer WHERE test_id = '$test_id2' and subject_id = '$sub' and course_id = '$course_id2' and sem = '$sem' and student_id = '$id1'");
                        if($row_user = mysqli_fetch_array($get_user))
                        {
                          $a = 1;
                        }
		
                ?>
                      <tr>
                        <td><?php echo $s_i;?></td>
                        <td><?php echo $test_id2;?></td>
                        <td><?php echo $t_nm;?></td>
                        <td><?php echo $t_type;?></td>
                        <td><?php echo $course;?></td>
                        <td><?php echo $semester;?></td>
                        <td><?php echo $subject;?></td>
                        <td><?php echo $test_date;?></td>
                        <td><?php echo $test_start_time;?></td>
                        <td><?php echo $test_end_time;?></td>
                        <td align="center">
              <?php 
                    if ($d == 1 && $t == 1) 
                    {
                    
               ?>
                      <a href="../test-setup/test.php?test_id=<?php echo base64_encode($test_id2);?>&subject_id=<?php echo base64_encode($sub);?>&course_id=<?php echo base64_encode($course_id2);?>&sem=<?php echo base64_encode($sem);?>" class="btn btn-primary btn-xs">Start Test</a>
              <?php 
                    }
                    elseif($a == 1)
                    {
               ?>
                      <a href="../test-setup/result.php?test_id=<?php echo base64_encode($test_id2);?>&subject_id=<?php echo base64_encode($sub);?>&course_id=<?php echo base64_encode($course_id2);?>&sem=<?php echo base64_encode($sem);?>" class="btn btn-primary btn-xs">Show Result</a>
              <?php 
                    }
               ?>
                        </td>
               
              <?php  
                  }
                } 
              }
              ?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
              <!--Data tables-->

            </div>
          </div>