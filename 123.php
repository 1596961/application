<?php
require('config.php');
// If the values are posted, insert them into the database.
if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $slquery = "SELECT 1 FROM register WHERE email = '$email'";
    $selectresult = mysql_query($slquery);
    if(mysql_num_rows($selectresult)>0)
    {
        die('email already exists');
    }

    $query = "INSERT INTO `register` (username, password,confirmpassword, email) VALUES ('$username', '$password', '$cpassword', '$email')";
    $result = mysql_query($query);
    if($result){
        $msg = "User Created Successfully.";
    }
   }
?>
