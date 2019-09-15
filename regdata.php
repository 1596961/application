<?php
//echo $_POST["fupload"];
if($_POST["t3"]!=$_POST["t4"] && $_POST["txtCaptcha"]!=$_POST["CaptchaInput"])
		{
			echo "<html>";
			echo "<head>";
			echo "<style>";
			echo "body{
				background-image:url('.jpg');
				background-size:1550px 980px;
				}";
			echo "h2.center{color:;text-align:center;font-size:35px;top:290px;left:500px;}";
			echo "</style>";
			echo "<body bgcolor='bisque'>";
			echo "<center>";
			echo "<br><br>";
			echo "<h2 class='center'><b>Password does not match with confirm password And The Captcha Code Does Not Match </b></h2>";
			echo "<h2 class='center'><b>Enter valid details</b></h2>";
			echo "<form method='POST' action=register.php>";
			echo "<input type='submit' value='BACK'/>";
			echo "</form>";
			echo "</center>";
			echo "</body>";
			echo "</html>";
			exit();
		}
else if($_POST["txtCaptcha"]!=$_POST["CaptchaInput"])
{
			echo "<html>";
			echo "<head>";
			echo "<style>";
			echo "body{
				background-image:url('c.jpg');
				background-size:1550px 980px;
				}";
			echo "h3.center{color:green;text-align:center;font-size:25px;top:290px;left:500px;}";
			echo "</style>";
			echo "<body bgcolor='F0FFFF'>";
			echo "<center>";
			echo "<br><br>";
			echo "<h3 class='center'><b>The Captcha Code Does Not Match</b></h3>";
			echo "<form method='POST' action=register.php>";
			echo "<input type='submit' value='BACK'/>";
			echo "</form>";
			echo "</center>";
			echo "</body>";
			echo "</html>";
			exit();
}
	//echo $_POST["txtCaptcha"];
//echo "<br>",$str;
	$x=$_POST["t3"];
	//echo "$x","<br>";
//	$y=rand(1,2);
	//$z=$x.$y;
	//echo "<br>",$z,"<br>";
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
}//for

//echo "$str";
	//$enc=$_POST['str'];
		
	
		if($_POST["t3"]!=$_POST["t4"])
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
			echo "<form method='POST' action=register.php>";
			echo "<input type='submit' value='BACK'/>";
			echo "</form>";
			echo "</center>";
			echo "</body>";
			echo "</html>";
			exit();
		}
		else if($_POST["t3"]== $_POST["t4"])
		{
			$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$f=$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="work/";
	$file1="file type:$file_type size:$file_size";

			$con=mysqli_connect("localhost","root","","regdatabase")or die("cannot connect");
			$sql="INSERT INTO `user_info`(`user_id`,`username`,`enc_password`,`hint_question`,`answer`,`fupload`) VALUES('".$_POST["t1"]."','".$_POST["t2"]."','$str','".$_POST["t5"]."','".$_POST["t6"]."','$f')";
			$res=mysqli_multi_query($con,$sql) or 
			die ("<html>
				<head>
				<style>
				body{
				background-image:url('reg.jpg');
				background-size:1550px 10800px;
				}
				h2.center{color:Dc143c;text-align:center;font-size:35px;top:290px;left:500px;}
				</style></head>
				<center>
				<body bgcolor='pink'>
				<form method='POST' action='home.php'>
				<br><br><br><h2 class='center'>User Already Existed</h2>
				<input type='submit' value='HOME'/>
				</form>
				</body>
				</center>
				</html>");
			$sql1="INSERT INTO `login_details`(`user_id`,`username`,`password`) VALUES('".$_POST["t1"]."','".$_POST["t2"]."','".$_POST["t3"]."')";
			mysqli_query($con,$sql1);
			mysqli_close($con);
		
		}

?>
<html>
	<head>
	<style type="text/css">
	.img2{position:absolute;top:75px;left:600px;width:225px;height:225px}
.1{position:absolute;top:125px;left:570px;width:225px;height:225px}
		body{
			  background-image:url("b7.jpg");
		      background-size:1400px 650px;
	          background-repeat:no-repeat;
			}
			.h1{
				position:absolute;
				top:40%;
				left:40%;
			}
			.h2{
				position:absolute;
				top:63%;
				left:47%;
			}
			}
			}
	</style>
	</head>
	<body>
	<p><img src="a3.jpg" class="img2"/></p>
<center>
<h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>Registration Success</h3>
<form action="home.php" class="1">
<input type="submit" value="close"></form>
</center>
	</body>
</html>