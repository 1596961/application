<html>
<head>
	<style type="text/css">
	body{
		background-image:url(".jpg");
		background-size:1550px 800px;
		}
		.h1{
			position:absolute;
			top:30%;
			left:50%;
		}
		.h2{
			position:absolute;
			top:35%;
			left:45%;
		}
		.h3{
			position:absolute;
			top:40%;
			left:45%;
		}
		.n1{
			position:absolute;
			top:35%;
			left:52%;
		}
		.n2{
			position:absolute;
			top:40%;
			left:52%;
		}
		.n3{
			position:absolute;
			top:45%;
			left:52%;
		}
		.n4{
			position:absolute;
			top:45%;
			left:56%;
		}
		
	</style>
	</head>
	<title>login form</title>
	</head>
	<body bgcolor="Tomato">
		<form align="center" method="POST" action="dblogin.php">
			<b class="h1">LOGIN</b><br><br>
			<b class="h2">Login Id*&nbsp;</b><input class="n1" name="uid" type="text" placeholder="enter username" required><br><br>
			<b class="h3">Password*&nbsp;</b><input class="n2" name="pswd" type="password"  placeholder="enter password" required><br><br>
			<form method="post" action="lvalidate.php">
             <input class="n3" type="SUBMIT" value="Login" name="SUBMIT"></form>
			 <input class="n4" type="SUBMIT" value="Clear" name="SUBMIT">
		</form>
	</body>
</html>