<html>
	<head>
	<style type="text/css">
	body{background-size:1500px 800px;}
	.l{top:0px;left:100px;width:300px;height:200px;}
	
	.capbox {
	background-color: #92D433;
	border: #B3E272 0px solid;
	border-width: 0px 12px 0px 0px;
	display: inline-block;
	*display: inline; zoom: 1; /* FOR IE7-8 */
	padding: 8px 40px 8px 8px;
	}

.capbox-inner {
	font: bold 11px arial, sans-serif;
	color: #000000;
	background-color: #DBF3BA;
	margin: 5px auto 0px auto;
	padding: 3px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	}

#CaptchaDiv {
	font: bold 17px verdana, arial, sans-serif;
	font-style: italic;
	color: #000000;
	background-color: #FFFFFF;
	padding: 4px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	}

#CaptchaInput { margin: 1px 0px 1px 0px; width: 135px; }

	body{background-image:url("1.jpg");
	background-size:1550px 800px;}

	</style>
	</head>
	<body>
		<form action="reg.php">
			<table  align="center" class="l" >
			<tr><th colspan=2><h1>User Registration</h1></th></tr>

	</table><center>
			<b>Username*<input type="text" placeholder="enter username" required><br><br>
			<b>UserId*<input type="text" placeholder="enter userid" required><br><br>
			Password*<input type="password" placeholder="enter password" required><br><br><b>
			<tr>
   <td><b>Enter characters
to displayed *</b></td> 
<!-- START CAPTCHA -->
<br><td>
<div class="capbox">

<div id="CaptchaDiv"></div>

<div class="capbox-inner">
Type the above number:<br>

<input type="hidden" id="txtCaptcha"/>
<input type="text" name="CaptchaInput" id="CaptchaInput" size="15"/></td></tr><br>
</div>
</div>
<br><br>
<!-- END CAPTCHA -->
<form method="post" onsubmit="return checkform(this);"> 
<script type="text/javascript">
function checkform(theform){
var why = "";

if(theform.CaptchaInput.value == ""){
why += "- Please Enter CAPTCHA Code.\n";
}
if(theform.CaptchaInput.value != ""){
if(ValidCaptcha(theform.CaptchaInput.value) == false){
why += "- The CAPTCHA Code Does Not Match.\n";
}
}
if(why != ""){
alert(why);
return false;
}
}

var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';

var code = a + b + c + d + e;
document.getElementById("txtCaptcha").value = code;
document.getElementById("CaptchaDiv").innerHTML = code;

// Validate input against the generated number
function ValidCaptcha(){
var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
var str2 = removeSpaces(document.getElementById('CaptchaInput').value);
if (str1 == str2){
return true;
}else{
return false;
}
}

// Remove the spaces from the entered and generated code
function removeSpaces(string){
return string.split(' ').join('');
}
</script>
</form></table><br>
		<tr><td colspan=2><input type="submit" name="login"></td></tr>	<center>
		</form>
	</body>
</html>