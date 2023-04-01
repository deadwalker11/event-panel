<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Knowledge Tester || DASHBOARD </title>
<link  rel="stylesheet" href="../css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="../css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="../css/main.css">
 <link  rel="stylesheet" href="../css/font.css">
 <script src="../js/jquery.js" type="text/javascript"></script>

  <script src="../js/bootstrap.min.js"  type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">KNOWLEDGE TESTER</span></div>
<?php
 include_once '../Database/config/config.php';

session_start();

$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
     header("location:../Index.php");

}
else
{
$name = $_SESSION['name'];;

include_once '../Database/config/config.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="#" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>

</div></div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="staffHomepage.php?q=0"><b>Dashboard</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="staffHomepage.php?q=0">Home<span class="sr-only">(current)</span></a></li>
             <li class="dropdown <?php if(@$_GET['q']==6 || @$_GET['q']==7) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Staff<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="staffHomepage.php?q=6">Add Staff</a></li>
            <li><a href="staffHomepage.php?q=7">Remove Staff</a></li>
      
          </ul>
               <li class="dropdown <?php if(@$_GET['q']==6 || @$_GET['q']==7) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Participate<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="staffHomepage.php?q=8">Add Participate</a></li>
            <li><a href="staffHomepage.php?q=1">Remove Participate</a></li>
      
          </ul>  
<!--         <li <?php /*if(@$_GET['q']==1) echo'class="active"'*/; ?>><a href="staffHomepage.php?q=1">Participate</a></li> -->
        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="staffHomepage.php?q=2">Ranking</a></li>
        <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="staffHomepage.php?q=3">Feedback</a></li>
            
        <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="staffHomepage.php?q=4">Add Quiz</a></li>
            <li><a href="staffHomepage.php?q=5">Remove Quiz</a></li>
            
          </ul>
        </li><li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
        
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
    $title = $row['title'];
    $total = $row['total'];
    $correct = $row['correct'];
    $time = $row['time'];
    $eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);    
if($rowcount == 0){
    echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$correct*$total.'</td><td>'.$time.'&nbsp;min</td>
    <td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$correct*$total.'</td><td>'.$time.'&nbsp;min</td>
    <td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div></div>';

}
?>
<!-- //ranking start -->

<?php
include "../Database/config/config.php";
if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM scores ORDER BY `score` DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Score</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$q12=mysqli_query($con,"SELECT * FROM participate WHERE email='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$name=$row['name'];
$gender=$row['gender'];
$college=$row['college'];
}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$s.'</td><td>';
}
echo '</table></div></div>';}

?>


<!--home closed-->

<!-- Staff start -->
<?php if(@$_GET['q']==7) {

$result = mysqli_query($con,"SELECT * FROM staff_tb") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Email</b></td></td><td><b>Position</b></td><td><b>Mobile</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $name = $row['name'];
  $mob = $row['phoneno'];
  $gender = $row['gender'];
  $email = $row['email'];
  $position = $row['position'];

  echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$email.'</td><td>'.$position.'</td><td>'.$mob.'</td>
  <td><a title="Delete Staff" href="update.php?semail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div></div>';

}?>
<!-- Staff closed -->
<!--users start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM participate") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Department</b></td><td><b>Email</b></td><td><b>Mobile</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $mob = $row['mob'];
    $gender = $row['gender'];
    $email = $row['email'];
    $college = $row['college'];
  $department = $row['department'];

    echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$college.'</td><td>'.$department.'</td><td>'.$email.'</td><td>'.$mob.'</td>
    <td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div></div>';

}?>
<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==3) {echo' 
You can send us your feedback through e-mail on the following e-mail id:<br />
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<a href="mailto:akashna1133@gmail.com" style="color:#000000">akashna1133@gmail.com</a><br /><br />
</div><div class="col-md-1"></div></div>
<p>Or you can directly submit your feedback by filling the enteries below:-</p>
<form role="form"  method="post" action="feed.php?q=staffHomepage.php">
<div class="row">
<div class="col-md-3"><b>Name:</b><br /><br /><br /><b>Subject:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text"><br />    
   <input id="name" name="subject" placeholder="Enter subject" class="form-control input-md" type="text">    

</div>
</div>
</div><!--End of row-->

<div class="row">
<div class="col-md-3"><b>E-Mail address:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">    
 </div>
</div>
</div><!--End of row-->

<div class="form-group"> 
<textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Write feedback here..."></textarea>
</div>
<div class="form-group" align="center">
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</form>';
}
?>
<!--feedback closed-->

<!-- feedback reading portion start-->
<?php /*if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $subject = $row['subject'];
    $date = $row['date'];
    $date= date("d-m-Y",strtotime($date));
    $time = $row['time'];
    $feedback = $row['feedback'];
    
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}*/
?>
<!--Feedback reading portion closed--> -->

<!-- add staff -->
<?php
if(@$_GET['q']==6){
echo'
<div class="card-header"><h2>Register for Staff</h2></div>
  <div class="card-body">
   <form class="form-horizontal" action="sign.php?q=staffHomepage.php" method="POST">
   <!-- Staff Name -->
   <div class="form-group row">
   <label for="staffname" class="col-md-4 col-form-label text-md-right">Full Name</label>
   <div class="col-md-6">
   <input type="text"  class="form-control" name="staffname" required>
   </div>
   </div>
   <!-- Staff gender -->
   <div class="form-group row">
  <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
  <div class="col-md-6">
    <span>Male&nbsp;<input type="radio" name="staffGender" value="M" required>&nbsp;&nbsp;&nbsp;&nbsp;Female&nbsp;
    <input type="radio" name="staffGender" value="F" required></span>
    </div>
    </div>
   <!-- Staff email -->
   <div class="form-group row">
   <label for="staffemail" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
   <div class="col-md-6">
   <input type="text" id="staffemail" class="form-control" name="staffemail" required>
   </div>
   </div>
   <!-- Staff password -->
   <div class="form-group row">
   <label for="staffpassword" class="col-md-4 col-form-label text-md-right">Password</label>
   <div class="col-md-6">
   <input type="password" id="staffpassword" class="form-control" name="staffpassword" required>
   </div>
   </div>
   <!-- Staff conform password -->
   <div class="form-group row">
   <label for="staffcpassword" class="col-md-4 col-form-label text-md-right">Conform Password</label>
   <div class="col-md-6">
   <input type="password" id="staffcpassword" class="form-control" onclick="return Validate()" name="staffcpassword" required>
   </div>
   </div>

<!-- Staff password -->
  <div class="form-group row">
  <label for="phonenumber" class="col-md-4 col-form-label text-md-right">Phone Number</label>
        <div class="col-md-6">
            <input type="text" name="phonenumber" id="phonenumber" class="form-control"required>
              </div>
          </div>
<!-- Staff position -->
<div class="form-group row">
  <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
  <div class="col-md-6">
      <input type="text" id="position" name="position" class="form-control">
      </div>
</div>

 <div class="col-md-6 offset-md-4">
     <button type="submit" class="btn btn-primary">
                    Register
     </button>
</div>
</div>
</form>
</div>
</div>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("staffpassword").value;
        var confirmPassword = document.getElementById("staffcpassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>'
;
}
?>

<!-- add participate -->
<?php
if(@$_GET['q']==8){
echo'
<div class="card-header"><h2>Register for Participate</h2></div>
  <div class="card-body">
   <form class="form-horizontal" action="signp.php?q=staffHomepage.php" method="POST">
   <!-- Staff Name -->
   <div class="form-group row">
   <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
   <div class="col-md-6">
   <input type="text"  class="form-control" name="name" required>
   </div>
   </div>
   <!-- participate gender -->
   <div class="form-group row">
  <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
  <div class="col-md-6">
    <span>Male&nbsp;<input type="radio" name="gender" value="M" required>&nbsp;&nbsp;&nbsp;&nbsp;Female&nbsp;
    <input type="radio" name="gender" value="F" required></span>
    </div>
    </div>
   <!-- participate email -->
   <div class="form-group row">
   <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
   <div class="col-md-6">
   <input type="text" id="email" class="form-control" name="email" required>
   </div>
   </div>
   <!-- participate password -->
   <div class="form-group row">
   <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
   <div class="col-md-6">
   <input type="password" id="password" class="form-control" name="password" required>
   </div>
   </div>
   <!-- Participate conform password -->
   <div class="form-group row">
   <label for="cpassword" class="col-md-4 col-form-label text-md-right">Conform Password</label>
   <div class="col-md-6">
   <input type="password" id="cpassword" class="form-control" onclick="return Validate()" name="cpassword" required>
   </div>
   </div>

<!-- User password -->
  <div class="form-group row">
  <label for="phonenumber" class="col-md-4 col-form-label text-md-right">Phone Number</label>
        <div class="col-md-6">
            <input type="number" name="phonenumber" id="phonenumber" class="form-control"required>
              </div>
          </div>
<!-- user position -->
<div class="form-group row">
  <label for="college" class="col-md-4 col-form-label text-md-right">College</label>
  <div class="col-md-6">
      <input type="text" id="college" name="college" class="form-control">
      </div>
</div>
<!-- user position -->
<div class="form-group row">
  <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
  <div class="col-md-6">
      <input type="text" id="department" name="department" class="form-control">
      </div>
</div>

 <div class="col-md-6 offset-md-4">
     <button type="submit" class="btn btn-primary">
                    Register
     </button>
</div>
</div>
</form>
</div>
</div>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("cpassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>'
;
}
?>

<!--add quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>
<!--add quiz end-->

<!--add quiz step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add quiz step 2 end-->

<!--remove quiz-->
<?php if(@$_GET['q']==5) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
    $title = $row['title'];
    $total = $row['total'];
    $correct = $row['correct'];
    $time = $row['time'];
    $eid = $row['eid'];
    echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$correct*$total.'</td><td>'.$time.'&nbsp;min</td>
    <td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>


</div><!--container closed-->
</div></div>
</body>
</html>
