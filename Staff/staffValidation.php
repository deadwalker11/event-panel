<?php
include_once '../Database/config/config.php';
$ref=@$_GET['q'];
$email = $_POST['staffUserName'];
$password = $_POST['staffPassword'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$result = mysqli_query($con,"SELECT email FROM staff_tb WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
$name = $row['name'];
if($count==1){
session_start();
if(isset($_SESSION['password'])){
session_unset();}
$_SESSION["name"] =  $name;
$_SESSION["key"] ='sunny7785068889';
$_SESSION["email"] = $email;
header("location:staffHomePage.php");
}
else header("location:$ref?w=Warning : Access denied");
?>