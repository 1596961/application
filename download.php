<?php
session_start();
	$user_id=$_SESSION["userid"];
	$userfile=$_SESSION["fname"];
 //echo $userfile;
 $con=mysqli_connect("localhost","root","","regdatabase")or die("cannot connect");
 $sql="select fupload from user_info where user_id='$user_id'" ;
 $query = mysqli_query($con,$sql);
while($rs = mysqli_fetch_assoc($query)){
     $fdownload = $rs['fupload'];
    //$user_middlename = $rs['user_middlename'];
    //$user_lastname = $rs['user_lastname'];
	//echo "<br>",$enc;
}
if($fdownload)
{
echo "<html>";
echo "<body>";
echo "<center>";
echo "<form action='home.php' method='POST'>";
echo "<br><br><br><p><b>Click on the download image logo to download the image</b><p>";

echo "<a href='$fdownload' download>";
echo "<img src='d.jpg' alt='W3Schools' width='104' height='142'>";

  
echo "</a>";

echo "<br><input type='submit' value='Exit'/>";
echo "</form>";
echo "</center>";
echo "</body>";
echo "</html>";
}
else if($fdownload=='')
{
	echo "<html>";
	echo "<style>
	p.normal {
  font-style: normal;
  font-size:28;
}";
echo "</style>";
echo "<body bgcolor='skyblue'>";
echo "<center>";
echo "<form action='lsuccess.php' method='POST'>";
echo "<br><br><br><b><p class='normal'> Your not upload any file if you want to upload a file Click Back button</p></b>";
echo "<br><input type='submit' value='Back'/>";
echo "</form>";
echo "</center>";
echo "</body>";
echo "</html>";
}
?>