<?php

/* Targeting th login button as part of the content.php
 */
include("/includes/connection.php");


if(isset($_POST['Login'])){
	
	$email = pg_escape_string($con,$_POST['email']);
	$pass  = pg_escape_string($con,$_POST['pass']);
	
	$get_user = "select * from USER_SN where user_email_id='$email' AND user_pass='$pass' AND user_staus='verified'";
	$run_user = pg_query($con,$get_user);
	$check = pg_num_rows($run_user);

	if($check == 1){
		$_SESSION['user_email'] = $email;
		
		echo "<script>window.open('home.php','_self') </script>" ; 
	}
	else{
		echo "<script> alert('Password or email is not correct,or your Email is not verified!') </script>";
		exit();
	}
}


?>