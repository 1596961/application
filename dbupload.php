<?php
session_start();
	$user_id=$_SESSION["userid"];
	//echo $user_id;
	
	if(isset($_POST["file"]))
	{
		echo $_POST["file"];
	$con=mysqli_connect("localhost","root","","regdatabase")or die("cannot connect");
	$sql="UPDATE `user_info` set `file_data`='".$_POST["file"]."' where user_id='$user_id'";
	mysqli_query($con,$sql);
	mysqli_close($con);
	}
	 
?>

	