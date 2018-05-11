<?php
  //User Defined Functions start...
    function redirect($filename) { //Function for redirect URL
        if (!headers_sent())
            header('Location: '.$filename);
        else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$filename.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$filename.'" />';
            echo '</noscript>';
        }
    }


    function generate_user_id() //Function for generate employee id
    {
      include 'connect-db.php';
      $n = 0;
      $result = mysqli_query($conn,"SELECT * FROM user_dtls");
      $num_rows = mysqli_num_rows($result);
      $l = "STUD";
      if ($n == 9999) {
        $n = 0;
        $l++;
      }
      $id = $l . sprintf("%04d", $num_rows+1);
      return $id;
    }

    //insert function
    function insert($tbl,$data)
    {
    	include 'connect-db.php';
    	$fld = "";
    	$insert_suc = "";
    	$c=0;
    	$get_ins = mysqli_query($conn,"SHOW COLUMNS FROM $tbl");
    	while($row_ins = mysqli_fetch_array($get_ins))
    	{
    		$c++;
    		$f=$row_ins['Field'];
    		if($c!=1)
    		{
    			$fld.="$f,";
    		}
    	}

    	$fld=rtrim($fld,",");

    	$query_ins = "INSERT INTO $tbl($fld) VALUES ($data)";
    	$result_ins = mysqli_query($conn,$query_ins);
    	return $insert_suc;
    }
    //User Defined Functions stop...

    //update function
    function update($tbl,$data,$unique_fld,$sl)
    {
    		$query_update = "UPDATE $tbl SET $data WHERE $unique_fld='$sl'";
    		$result_update = mysqli_query($conn,$query_update);
    		return $update1;
    }

?>
