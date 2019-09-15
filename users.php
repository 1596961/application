<html>
<style>
.h2{
	position:absolute;
	left:45%;
	
}
</style>
<body bgcolor="lightgrey">
<?php
$con=mysqli_connect("localhost","root","","regdatabase") or die("couldn't connect to server");
$sql="SELECT * FROM `user_info`";
$res=mysqli_query($con,$sql) or die("Query Failed");
echo "<table border='2'>";
echo '<th>User Id</th><th>User name</th><th>encrypted password</th><th>hint_question</th><th>answer</th>';
while($row=mysqli_fetch_array($res))
{
	
	echo '<tr>
	 <td>'.$row['user_id'].'</td>
     <td>'.$row['username'].'</td>
	 <td>'.$row['enc_password'].'</td>
	<td>'.$row['hint_question'].'</td>
	 <td>'.$row['answer'].'</td>
     </tr>';
 }
echo "</table>";
mysqli_close($con);
?>
<br><br><br>
<form action="home.php" method="post">
	   <input  class="h2" type="submit" value="back"/>
	   </form>
	
</body>
</html>