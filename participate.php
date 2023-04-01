<?php include('Database/config/config.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Participation Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="header">
		<h2>Participant Login</h2>
	</div>
	
	<form method="post" action="participateValidation.php">

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="email" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
	</form>


</body>
</html>