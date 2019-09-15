<?php
$pass="011*cab";
$a=strlen($pass);
	$b[0]=$b[1]=$b[2]=$b[3]=0;
	$str=null;
//echo $a;
	for($i=0;$i<$a;$i++)
	{
		if(is_numeric($pass[$i]))
		{
			if($pass[$i] == 0)
			{
				$p=00;
				$str=$str.$p;
			}
			else if($pass[$i] == 1)
			{
				$p==01;
			}
			else{
				$
			}
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
				$p="*";
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
				$p="*";
				$str=$str.$p;
			}
	
			else{
				$str=$str.$pass[$i];
			//echo $pass[$i];
			}
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
		
			//if
}//for
echo $str;
?>