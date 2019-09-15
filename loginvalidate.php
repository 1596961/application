<?php
session_start();
$con=mysqli_connect("localhost","root","","dbproject") or die("Couldn't connect to server");
$sql="select * from `admin_info` where `username`='".$_POST["uid"]."' AND `password`='".$_POST["pswd"]."'"; 
$res=mysqli_query($con,$sql) or die("Query1 Failed");
$que=mysqli_fetch_row($res);
if($que)
{
	header("Location:afteradminlogin.php");
}
else
{
	header("Location:loginerror.php");
}
mysqli_close($con);
?>
