<?php 
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<form>
		<h1>Login</h1>
		<input type="text" name="email" placeholder="Email Address">
		<input type="password" name="password" placeholder="Password">
		<input type="hidden" name="action" value="login">
		<input type="submit" name="submit" value="Log In!">
	</form>
</body>
</html>