<?php
session_start();
	$user_id=$_SESSION["userid"];

if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="work/";
  $file1="file type:$file_type size:$file_size";
 //echo $file1;
  $f=$_FILES['file']['name'];
  $_SESSION['fname'] =$f;
  //$_SESSION['fname'];
 //move_uploaded_file($file_loc,$folder.$file);
 $con=mysqli_connect("localhost","root","","regdatabase")or die("cannot connect");
 $sql="UPDATE user_info set fupload='$f' where user_id='$user_id'";
 //$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
 if(mysqli_query($con,$sql))
 {
	 
	 echo "<html>";
			echo "<head>";
			echo "<style>";
			echo "body{
				background-image:url('.png');
				background-size:1550px 980px;
				}";
			echo "h2.center{color:text-align:center;font-size:35px;top:290px;left:500px;}";
			echo "</style>";
			echo "<body bgcolor='lightcoral'>";
			echo "<center>";
			echo "<br><br>";
			echo "<h2 class='center'><b>File Uploaded Successfully</b></h2>";
			echo "<form method='POST' action=lsuccess.php>";
			echo "<input type='submit' value='BACK'/>";
			echo "</form>";
			echo "</center>";
			echo "</body>";
			echo "</html>";
 }	 
 else
	 echo "error";
}
?>