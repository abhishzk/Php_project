<?php

include '../../config.php';

		$mobile = $_REQUEST['mobile'];
?>
		<select class="form-control col-md-7 col-xs-12" id="student" name="student" required="required">
            <option value="0">Choose Student</option>
<?php
		$get = mysqli_query($conn,"SELECT * FROM user_dtls where user_ph='$mobile' and lvl=5");

	    while($row = mysqli_fetch_array($get))
	    {  
	        $user_id = $row['user_id'];               
?>
            <option value="<?php echo $row['user_id']; ?>"><?php echo $row['user_nm']; ?></option>
                        
<?php
	    }
?>
	    </select>