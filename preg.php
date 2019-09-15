<?php
$username = "root";
$password = "";
$hostname = "localhost"; 
$db = "regdatabase";
//$con=mysqli_connect("localhost","root","","regdatabase")or die("cannot connect");
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password,$db) or die("Unable to connect to MySQL");
//mysql_select_db($db,$dbhandle) or die('cannot select db');

if(isset($_POST['submit'])) {

     $name= $_POST['name'];

     $username= $_POST['username'];
    $password= $_POST['password'];
     $cpassword= $_POST['cpassword'];

     if($name==''){
     echo "<script>alert('Please enter Name')
     </script>";
    exit();
    }
    if($username==''){
     echo "<script>alert('Please enter Username')
     </script>";
    exit();
    }
    if($password=='' && $password<6){
     echo "<script>alert('Please enter  Password')</script>";

    exit();
    }

    if($cpassword==''){
     echo "<script>alert('Please enter Confirm Password')
     </script>";

    }



    $check_name="select * from registration where username='$username'";
    $run=mysql_query($check_name);

     if(mysql_num_rows($run)>0){
    echo "<script>alert('Username $username already exits in our database. Please try with Another!')</script>";

    }

    elseif($password != $cpassword){
       echo "<script>alert('passwords doesn't match')</script>";
    }
    else{
          $query = "INSERT INTO `registration` (name,username, password,cpassword) VALUES ('$name','$username', '$password', '$cpassword')";
          $run1=mysql_query($query);

    if($run1){
    echo "<script>window.open('register.html','_self')</script>";
    }
    }
    }
    ?> 
