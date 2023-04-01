<?php
include_once '../Database/config/config.php';
$ref=@$_GET['q'];
$email = $_POST['adminUserName'];
$password = $_POST['adminPassword'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$result = mysqli_query($con,"SELECT email FROM admin_tb WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
session_start();
if(isset($_SESSION['password'])){
session_unset();}
$_SESSION["name"] = 'Admin';
$_SESSION["key"] ='sunny7785068889';
$_SESSION["email"] = $email;
header("location:adminHomePage.php");
}
else header("location:$ref?w=Warning : Access denied");
?>