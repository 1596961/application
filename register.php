<html>
<head>
<style type="text/css">
div{margin_left:90px}
table{
    margin:-100px 0px 0px 250px;
	}
	body{background-size:1500px 800px;}
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

	body{background-image:url("pink.jpg");
	background-size:920px 980px;}
	</style>
</head>
<body onload="myFunction()"><center>
<form method="POST" action="regdata.php" enctype="multipart/form-data">
<h1><br>User Registration</h1>
<table cols=2 border=0>
<tr><div>
   <td><b>Login Id * </b></td>  <td><input type="text" placeholder="enter login id" name="t1" required/><br><br></td></div></tr>
   <tr><div>
   <td><b>Username * </b></td>  <td><input type="text" placeholder="enter username" name="t2" required/><br><br></td></div></tr>
<tr>
   <td><b>Password* </b></td> <td> <input type="password" placeholder="enter password" name="t3" required/><br><br></td></tr>
<tr>
   <td><b>Confirm Password*</b></td><td><input type="password" placeholder="enter confirm password" name="t4" required/><br><br></td></tr>
<tr>
	<td><b>Hint Question * </b></td><td>  
	<select name="t5" >
	<option>select</option>
	<option>mother's maiden name</option>
	<option>favourite color</option>
	<option>favourite God</option>
	<option>favourite food</option>
	<option>favourite movie</option>
	<option>favourite place</option>
	<option>Lucky Number</option>
	<option>Nick Name</option>
	</select><br><br></td>
</tr>
<tr>
   <td><b>Hint Answer*</b></td><td><input type="text" placeholder="enter answer" name="t6" required/><br><br></td></tr>
  <tr><td><b>Upload File</td><td><form action="" method="post" enctype="multipart/form-data">
<input type="file" name="file" /></form></td></tr>
 <tr><br><br>
   <td><b>Enter displayed characters*</b></td>
<!-- START CAPTCHA -->
<br><td>
<div class="capbox">

<div id="CaptchaDiv"></div>

<div class="capbox-inner">
Type the above number:<br>

<input type="hidden" name="txtCaptcha" id="txtCaptcha"/>
<input type="text" name="CaptchaInput" id="CaptchaInput" size="15" required/></td></tr><br>
</div>
</div>
<br><br>
<!-- END CAPTCHA --></center>
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
/*
function myFunction(){
  var x = document.getElementById("myFile");
  var txt = "";
  if ('files' in x) {
    if (x.files.length == 0) {
      txt = "Select one or more files.";
    } else {
      for (var i = 0; i < x.files.length; i++) {
        txt += "<br><strong>" + (i+1) + ". file</strong><br>";
        var file = x.files[i];
        if ('name' in file) {
          txt += "name: " + file.name + "<br>";
        }
        if ('size' in file) {
          txt += "size: " + file.size + " bytes <br>";
        }
      }
    }
  } 
  else {
    if (x.value == "") {
      txt += "Select one or more files.";
    } else {
      txt += "The files property is not supported by your browser!";
      txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
    }
  }
  document.getElementById("demo").innerHTML = txt;
}*/
</script>
</form>
 <br><br><br></table><br><br>&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Register" name="submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value="Clear"/><br><br>
</form> </center>
</body>
</html>

