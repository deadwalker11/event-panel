<!Doctype html>
<html lang="en">
<head>
<!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initiak-scale=1, shrinl-to-fit=no">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <link href="../login.css" rel="stylesheet" type="text/css"/>
</head>
<body> <?php
        session_start();
        ?>
    <section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">ADMIN LOGIN</h2>
		    <form class="login-form" action="adminValidation.php" method="POST">
        <div></div>
    <div class="form-group"><a href="#" >ADMIN</a> &nbsp;&nbsp; <a href="../Index.php" >STAFF</a></div>            
  <div class="form-group">
    <label for="adminUserName" class="text-uppercase">Username</label>
    <input type="text" class="form-control" name="adminUserName" id="adminUserName" placeholder="" required="">
    
  </div>
  <div class="form-group">
    <label for="adminPassword" class="text-uppercase">Password</label>
    <input type="password" class="form-control" name="adminPassword" id="adminPassword" placeholder="" required="">
  </div>
  
  
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Remember Me</small>
    </label>
    <button type="submit" name="adminSubmit" value="submit" class="btn btn-login float-right">Submit</button>
  </div>
  
</form>
<div class="copy-text">Created with <i class="fa fa-heart"></i> by Akash N</div>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="../img/Knowledge.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>.</h2>
            <p></p>
        </div>	
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="../img/Tester.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>.</h2>
            <p></p>
        </div>	
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="../img/staff.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div >
            <h2 class="color">KNOWLEDGE TESTER</h2>
            <p></p>
        </div>	
    </div>
  </div>
            </div>	   
		    
		</div>
	</div>
</div>
</section>
    
    
    
    
   <!-- Bootstrap css and js file-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    </body>    
</html>