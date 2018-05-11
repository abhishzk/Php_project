<?php

include '../../config.php';



$setSql = "SELECT test_id,teacher_id,course_id,subject_id FROM q_temp where teacher_id='$id1' and status='-1'";
$setRec = mysqli_query($conn, $setSql);  
  
$columnHeader = '';  
$columnHeader = "test_id" . "\t" . "teacher_id" . "\t" . "course_id" . "\t" . "subject_id" . "\t" . "question" . "\t" . "option_1" . "\t" . "option_2" . "\t" . "option_3" . "\t" . "option_4" . "\t" . "right_answer" . "\t" . "q_status" . "\t" ;
  
$setData = '';

while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
  
//header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=question-setup.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  

 ?>