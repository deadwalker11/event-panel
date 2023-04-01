<?php
include_once '../Database/config/config.php';
ob_start();
$name = $_POST['staffname'];
$name= ucwords(strtolower($name));
$gender = $_POST['staffGender'];
$email = $_POST['staffemail'];
$position = $_POST['position'];
$mob = $_POST['phonenumber'];
$password = $_POST['staffpassword'];
/*$name = stripslashes($name);
$name = addslashes($name);
$name = ucwords(strtolower($name));
$gender = stripslashes($gender);
$gender = addslashes($gender);
$email = stripslashes($email);
$email = addslashes($email);
$position = stripslashes($position);
$position = addslashes($position);
$mob = stripslashes($mob);
$mob = addslashes($mob);

$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);
*/
$q3=mysqli_query($con,"INSERT INTO `staff_tb` VALUES  ('$name' , '$gender' , '$email','$password','$position','$mob')");
if($q3)
{
session_start();
$_SESSION["email"] = $email;
$_SESSION["name"] = $name;

header("location:staffHomepage.php?q=7");
echo '<script> 
alert("Staff registration successfully done";
 </script>';
}
else
{
echo '<script> 
alert("Staff email already registrated";
 </script>';
header("location:staffHomepage.php?q=6  echo '<script> 
alert('Staff email already registrated');
 </script>';");

}
ob_end_flush();
?>