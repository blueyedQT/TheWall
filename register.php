<?php 
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
</head>
<body>
	<form>
		<h1>Register</h1>
		<input type="text" name="first_name" placeholder="First Name">
		<input type="text" name="last_name" placeholder="Last Name">
		<input type="text" name="email" placeholder="Email Address">
		<input type="password" name="password" placeholder="Password">
		<input type="password" name="password2" placeholder="Confirm Password">
		<input type="hidden" name="action" value="reigster">
		<input type="submit" name="submit" value="Register Me!">
	</form>
</body>
</html>