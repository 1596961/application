<?php
$con=mysqli_connect("localhost","root","","encrypt") or die("couldn't connect to server");
$pwd= hash('sha256',$_POST['uid']);
$pass=strrev($pwd);
echo $pass,"<br><br>";
$a=strlen($pass);
$b[1]=$b[2]=$b[0]=$b[3]=0;
$str=null;
//echo $a;
for($i=0;$i<$a;$i++)
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
		echo "0";
		$p=0;
		$str=$str.$p;
	}
	else if($b[0]==0 && $b[1]==1){
		echo "1";
		$p=1;
		$str=$str.$p;
	}
	else if($b[0]==1 && $b[1]==0){
		echo "*";
		$p="*";
		$str=$str.$p;
	}
	else if($b[0]==1 && $b[1]==1){
		echo "*";
		$p="*";
		$str=$str.$p;
	}
	if($b[2]==0 && $b[3]==0){
		echo "0";
		$p=0;
		$str=$str.$p;
	}
	else if($b[2]==0 && $b[3]==1){
		echo "1";
		$p=1;
		$str=$str.$p;
	}
	else if($b[2]==1 && $b[3]==0){
		echo "*";
		$p="*";
		$str=$str.$p;
	}
	else if($b[2]==1 && $b[3]==1){
		echo "*";
		$p="*";
		$str=$str.$p;
	}
}
	else{
		$str=$str.$pass[$i];
		echo $pass[$i];
	}
		//continue;
echo "<br>",$str;
$sql="INSERT INTO `user_details`(`uid`,`password`,`enc_password`) VALUES
('".$_POST["uid"]."','".$_POST["pswd"]."','".$_POST["$str"]."')";
$res=mysqli_query($con,$sql) or die ("query failed");
mysqli_close($con);
?>