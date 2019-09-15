<html>
<?php
session_start();
if(isset($_POST["uid"]))
{
	$_SESSION['userid'] = $_POST["uid"];
	//$uid=$_POST["uid"];
	
	$enc=null;
	$con=mysqli_connect("localhost","root","","regdatabase")or die("cannot connect");
	$sql="select enc_password from user_info where user_id='".$_POST["uid"]."'" ;
	$query = mysqli_query($con,$sql);
while($rs = mysqli_fetch_assoc($query)){
    $enc = $rs['enc_password'];
    //$user_middlename = $rs['user_middlename'];
    //$user_lastname = $rs['user_lastname'];
	//echo "<br>",$enc;
}
$len=strlen($enc);
$str=null;
for($j=0;$j<$len;$j++)
{
	if(is_numeric($enc[$j]))
	{
		if($enc[$j]==0)
		{
			$p='00';
			$str=$str.$p;
		}
		else if($enc[$j]==1)
		{
			$p='01';
			$str=$str.$p;
		}
		
	}
	else if($enc[$j]=='@')
	{
		$p='11';
		$str=$str.$p;
	}
	else if($enc[$j]=='*')
	{
		$p='10';
		$str=$str.$p;
	}
	
		else
		{
			$str.=$enc[$j];
		}
}
echo "decode:<br>",$str;




if(isset($_POST["psw"]))
{
	$s=null;
	$pwd=$_POST["psw"];
	//$x='abc123';
	$sha=hash('sha256',$pwd);
	$pass=strrev($sha);
	echo "Password:<br>",$pwd,"<br><br>sha:",$sha,"<br><br>reverse:",$pass,"<br><br>";
	
	$a=strlen($pass);
	$b[0]=$b[1]=$b[2]=$b[3]=0;
	$str1=null;
	$x=0;
//echo $a;
	for($i=0;$i<$a;$i++)
	{
		if(is_numeric($pass[$i]))
		{
			$x=decbin($pass[$i]);
			//echo " ",$x," ";
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
			$y=$b[0].$b[1].$b[2].$b[3];

			//echo $y; 
		}	
		else
		{
				$p=0;
				$str1=$str1.$p;
				$y=$pass[$i];
		}
		$s.=$y;
		
	}//for
	


//echo "<br><br><br><br>",$str,"<br>";
echo  "<br>s is:",$s,"<br>str is",$str;

if($s == $str)
{
	//echo "<br><br>yes";
	header("Location:lsuccess.php");
}
else{
	echo "no";
	header("Location:ufail.php");
}

}
}

?>
<a href="forgot.php" title=""></a>
</html>