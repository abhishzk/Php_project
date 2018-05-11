<?php 

include '../../config.php';

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
                        <th>Question Submission Last Date</th>
                        <th>Total No. of Questions</th>
                        <th>Test Type</th>
                        <th>Test Course</th>
                        <th>Test Subject</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                    $s_i=0;

                $get_user = mysqli_query($conn,"SELECT * FROM create_test where test_stat='1'");
                while($row_user = mysqli_fetch_array($get_user))
                {
                        
                  $user_sl=$row_user['sl'];
                  $user_test_id=$row_user['test_id'];
                  $user_test_nm=$row_user['test_nm'];
                  $user_qsld=$row_user['question_submission_last_dt'];
                  $user_tnq=$row_user['total_no_questions'];
                  $user_test_type=$row_user['test_type'];
                  $user_test_course=$row_user['test_course'];
                  $user_test_subject=$row_user['test_subjects'];

                  if ($user_test_type == '1') 
                  {
                    $user_test_type = "MCQ";
                  }
                        
                $subjects = explode(",", $row_user['test_subjects']);
                foreach($subjects as $sub) 
                { $s_i++;
                  $sub = trim($sub);

                  $get_user7 = mysqli_query($conn,"SELECT * FROM assign_subject where teacher_id='$id1' and subject_id='$sub' and course_id='$user_test_course'");
                  while($row_user7 = mysqli_fetch_array($get_user7))
                  {
                    $get_user2 = mysqli_query($conn,"SELECT * FROM subject_dtls where subject_id='$sub'");
                    while($row_user2 = mysqli_fetch_array($get_user2))
                    {
                      $subject_nm=$row_user2['subject_nm'];
                    }

                    $get_user3 = mysqli_query($conn,"SELECT * FROM course_dtls where course_id='$user_test_course'");
                    while($row_user3 = mysqli_fetch_array($get_user3))
                    {
                      $course_nm=$row_user3['course_nm'];
                    }
                ?>
                      <tr>
                        <td><?php echo $s_i;?></td>
                        <td><?php echo $user_test_id;?></td>
                        <td><?php echo $user_test_nm;?></td>
                        <td><?php echo $user_qsld;?></td>
                        <td><?php echo $user_tnq;?></td>
                        <td><?php echo $user_test_type;?></td>
                        <td><?php echo $course_nm;?></td>
                        <td><?php echo $subject_nm;?></td>
                <?php 
                      
                    $get = mysqli_query($conn,"SELECT * FROM q_temp where teacher_id='$id1' and test_id='$user_test_id' and course_id='$user_test_course' and subject_id='$sub'");
                    if($row = mysqli_fetch_array($get))
                    {
                      $stat=$row['status'];
                    }
                    else
                    {
                      $stat = "";
                    }

                ?>
                        <td align="center">
                <?php
                    if ($stat == "" || $stat=="1") 
                    {
                      
                ?>
                        <a href="../test-setup/temp.php?test_id=<?php echo $user_test_id;?>&subject_id=<?php echo $sub;?>&course_id=<?php echo $user_test_course;?>" class="btn btn-primary btn-xs">Set Questions</a>
                <?php
                    }
                    elseif ($stat == "0") 
                    {
                      
                ?>
                        <a href="" class="btn btn-primary btn-xs" disabled>Set Questions</a>
                <?php
                    }
                    elseif ($stat == "2") 
                    {
                ?>
                        <a href="../test-setup/temp2.php?test_id=<?php echo $user_test_id;?>&subject_id=<?php echo $sub;?>&course_id=<?php echo $user_test_course;?>" class="btn btn-danger btn-xs">Resume</a>
                <?php
                    }
                ?>
                        </td>
                      </tr>
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