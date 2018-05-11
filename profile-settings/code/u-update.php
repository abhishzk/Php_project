<?php  

include '../../config.php';

if (isset($_POST['name'])) 
{
	$name = $_POST['name'];

	$query_update = mysqli_query($conn,"UPDATE user_dtls set user_nm='$name' where user_id='$id1'");

	echo "1";
}

if (isset($_POST['address'])) 
{
	$address = $_POST['address'];

	$query_update = mysqli_query($conn,"UPDATE user_dtls set user_add='$address' where user_id='$id1'");

	echo "1";
}

if (isset($_POST['phone'])) 
{
	$phone = $_POST['phone'];

	$query_update = mysqli_query($conn,"UPDATE user_dtls set user_ph='$phone' where user_id='$id1'");

	echo "1";
}

if (isset($_POST['email'])) 
{
	$email = $_POST['email'];

	$query_update = mysqli_query($conn,"UPDATE user_dtls set user_email='$email' where user_id='$id1'");

	echo "1";
}

if (isset($_POST['pass'])) 
{
	$pass = $_POST['pass'];

	$query_update = mysqli_query($conn,"UPDATE user_dtls set user_pass='$pass' where user_id='$id1'");

	echo "1";
}
?>