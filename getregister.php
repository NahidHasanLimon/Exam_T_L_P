<?php
 $filepath = realpath(dirname(__FILE__));
	
	include_once ($filepath.'/classes/User.php');
	$usr2= new User();
	
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    $user_Reg = $usr2->user_Registration($name,$username,$password,$email);
   
}

?>