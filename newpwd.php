<?php
session_start();
$id=$_SESSION["userid"];
$a=$_POST["ans"];
$con=mysqli_connect("localhost","root","","regdatabase")or die("cannot connect");
$sql="select answer from user_info where user_id='$id'" ;
if($query=mysqli_query($con,$sql))
		{
			while($rs = mysqli_fetch_assoc($query)){
			$answer= $rs['answer'];
    //$user_middlename = $rs['user_middlename'];
    //$user_lastname = $rs['user_lastname'];
		
		
		}
		}
if($a==$answer)
{
	echo "<html>";
	echo "<body bgcolor='lightgrey'>";
	echo "<center>";
	echo "<form method='POST' action='updatepwd.php'><br><br><br><br><br><br><br><br><br>";
	echo "<center>";
	echo "<b>New Password* </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='password' placeholder='enter password' name='t3' required/><br><br>";
	echo "<b>Confirm Password*</b><input type='password' placeholder='enter confirm password' name='t4' required/><br><br><br>";
	echo "<input type='submit' value='SUBMIT'>&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input type='reset' value='CLEAR'>";
	echo "</center>";
	echo "</form>";
	echo "</center>";
	echo "</body>";
	echo "</html>";
}
else
{
	echo "<html>";
			echo "<head>";
			echo "<style>";
			echo "body{
				background-image:url('p1.jpg');
				background-size:1550px 980px;
				}";
			echo "h2.center{color:text-align:center;font-size:35px;top:290px;left:500px;}";
			echo "</style>";
			echo "</head>";
			echo "<body bgcolor='#F0F8FF'>";
			echo "<center>";
			echo "<br><br>";
			echo "<h2 class='center'><b>Hint answer doesn't match</b></h2>";
			echo "<form method='POST' action='forgot.php'>";
			echo "<input type='submit' value='BACK'/>";
			echo "</form>";
			echo "</center>";
			echo "</body>";
			echo "</html>";
			exit();
}
//$query = mysqli_query($con,$sql);
/*<html>
<body bgcolor="lightgrey">
<center>
<form method="POST" action="updatepwd.php"><br><br><br><br><br><br><br><br><br>
<center>
<b>New Password* </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" placeholder="enter password" name="t3" required/><br><br>
<b>Confirm Password*</b><input type="password" placeholder="enter confirm password" name="t4" required/><br><br><br>
<input type="submit" value="SUBMIT">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="CLEAR">
</center>
</form>
</center>
</body>
</html>*/
?>