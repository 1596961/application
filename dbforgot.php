<?php
session_start();
if(isset($_POST["uid"]))
{
	//echo $_POST["uid"];
	$id=$_POST["uid"];
	 $_SESSION["userid"] ="$id";
	 $con=mysqli_connect("localhost","root","","regdatabase")or die("cannot connect");
	 $sq=mysqli_query($con,"select user_id from user_info where user_id='".$_POST["uid"]."'");
	 if(mysqli_num_rows($sq)!=0)
	 {
	//echo "user";
		$sql="select hint_question from user_info where user_id='".$_POST["uid"]."'" ;
		if($query1=mysqli_query($con,$sql))
		{
			//echo "hlo";
			while($rs = mysqli_fetch_assoc($query1)){
			$hintques = $rs['hint_question'];
    //$user_middlename = $rs['user_middlename'];
    //$user_lastname = $rs['user_lastname'];
		echo "<html>";
		echo "<body bgcolor='silver'>";
		echo "<br><br><br><center>";
		echo "<br><h2>",$hintques,"</h2>";
		echo "<form action='newpwd.php' method='POST'>";
		echo "<br>Enter your Answer&nbsp;  ";
		echo "<input type='text' name='ans' placeholder='Enter your Answer' required/><br><br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' value='SUBMIT'/>";
		echo "</form></center></body></html>";
	}
	}
	else{
		//echo "hi";
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
			echo "<body bgcolor='salmon'>";
			echo "<center>";
			echo "<br><br>";
			echo "<h2 class='center'><b>Answer Doesn't Match</b></h2>";
			echo "<form method='POST' action=home.php>";
			echo "<input type='submit' value='BACK'/>";
			echo "</form>";
			echo "</center>";
			echo "</body>";
			echo "</html>";
	 }
	 }
	 else{ 
			//echo "hello";
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
			echo "<body bgcolor='salmon'>";
			echo "<center>";
			echo "<br><br>";
			echo "<h2 class='center'><b>Invalid User</b></h2>";
			echo "<form method='POST' action=userlogin.php>";
			echo "<input type='submit' value='BACK'/>";
			echo "</form>";
			echo "</center>";
			echo "</body>";
			echo "</html>";
		 
	 }
	mysqli_close($con);
}

?>
