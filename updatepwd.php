<?php
session_start();
	$user_id=$_SESSION["userid"];
	//echo $user_id;
	if($_POST["t3"]== $_POST["t4"])
		{
			
			$x=$_POST["t3"];
			$pwd= hash('sha256',$x);
	$pass=strrev($pwd);
//echo $pass,"<br><br>";
	$a=strlen($pass);
	$b[0]=$b[1]=$b[2]=$b[3]=0;
	$str=null;
//echo $a;
	for($i=0;$i<$a;$i++)
	{
		if(is_numeric($pass[$i]))
		{
			$x=decbin($pass[$i]);
			$j=0;
			while($x>0)
			{
				$b[$j]=$x%10;
				$j++;
				$x=$x/10;
			}
			$temp=$b[0];
			$b[0]=$b[3];
			$b[3]=$temp;
			$temp=$b[1];
			$b[1]=$b[2];
			$b[2]=$temp;
			if($b[0]==0 && $b[1]==0){
			//echo "0";
				$p=0;
				$str=$str.$p;
			}
			else if($b[0]==0 && $b[1]==1){
		//echo "1";
				$p=1;
				$str=$str.$p;
			}
			else if($b[0]==1 && $b[1]==0){
		//echo "*";
				$p="*";
				$str=$str.$p;
			}
			else if($b[0]==1 && $b[1]==1){
		//echo "*";
				$p="@";
				$str=$str.$p;
			}
			if($b[2]==0 && $b[3]==0){
		//echo "0";
				$p=0;
				$str=$str.$p;
			}
			else if($b[2]==0 && $b[3]==1){
		//echo "1";
			$p=1;
			$str=$str.$p;
			}
			else if($b[2]==1 && $b[3]==0){
		//echo "*";
				$p="*";
				$str=$str.$p;
				}
			else if($b[2]==1 && $b[3]==1){
		//echo "*";
				$p="@";
				$str=$str.$p;
			}
	
			else{
				$str=$str.$pass[$i];
			//echo $pass[$i];
			}
		
		}
		else
		{
			$str.=$pass[$i];
		}
			//if
}

			$con=mysqli_connect("localhost","root","","regdatabase")or die("cannot connect");
			$sql="UPDATE user_info set enc_password='$str' where user_id='$user_id'";
			//$sql="INSERT INTO `user_info`(`password`) VALUES('".$_POST["t3"]."')";
			if(mysqli_query($con,$sql))
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
			echo "<body bgcolor='lightcoral'>";
			echo "<center>";
			echo "<br><br>";
			echo "<h2 class='center'><b>Password Updated Successfully</b></h2>";
			echo "<form method='POST' action=home.php>";
			echo "<input type='submit' value='BACK'/>";
			echo "</form>";
			echo "</center>";
			echo "</body>";
			echo "</html>";

			}
			else{
				echo "<html>";
			echo "<head>";
			echo "<style>";
			echo "body{
				background-image:url('p1.jpg');
				background-size:1550px 980px;
				}";
			echo "h2.center{color:text-align:center;font-size:35px;top:290px;left:500px;}";
			echo "</style>";
			echo "<body bgcolor='lightcoral'>";
			echo "<center>";
			echo "<br><br>";
			echo "<h2 class='center'><b>Invalid User Please Register</b></h2>";
			echo "<form method='POST' action=home.php>";
			echo "<input type='submit' value='BACK'/>";
			echo "</form>";
			echo "</center>";
			echo "</body>";
			echo "</html>";

			}
			mysqli_close($con);
		}
else if($_POST["t3"]!=$_POST["t4"])
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
			echo "<body bgcolor='#F0F8FF'>";
			echo "<center>";
			echo "<br><br>";
			echo "<h2 class='center'><b>Password does not match with confirm password</b></h2>";
			echo "<form method='POST' action=forgot.php>";
			echo "<input type='submit' value='BACK'/>";
			echo "</form>";
			echo "</center>";
			echo "</body>";
			echo "</html>";
			exit();
		}
		
?>