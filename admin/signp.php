<?php
include_once '../Database/config/config.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$gender = $_POST['gender'];
$email = $_POST['email'];
$college = $_POST['college'];
$department = $_POST['department'];
$mob = $_POST['phonenumber'];
$password = $_POST['password'];
$q3=mysqli_query($con,"INSERT INTO `participate` VALUES  ('$name' , '$gender' ,'$college','$department', '$email','$mob','$password')");
if($q3)
{
session_start();
$_SESSION["email"] = $email;
$_SESSION["name"] = $name;

header("location:adminHomepage.php?q=1");
echo '<script> 
alert("Staff registration successfully done";
 </script>';
}
else
{
echo '<script> 
alert("Staff email already registrated";
 </script>';
header("location:adminHomepage.php?q=8");

}
ob_end_flush();
?>