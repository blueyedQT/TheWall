<?php 
session_start();
var_dump($_SESSION);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<?php 
	if(!empty($_SESSION['messages'])) {
		foreach($_SESSION['messages'] as $message) {
			echo '<p class="red">' . $message . '</p>';
		}
	} ?>
	<form class="index" action="process.php" method="post">
		<h1>Register</h1>
		<input type="text" name="first_name" placeholder="First Name">
		<input type="text" name="last_name" placeholder="Last Name">
		<input type="text" name="email" placeholder="Email Address">
		<input type="password" name="password" placeholder="Password">
		<input type="password" name="password2" placeholder="Confirm Password">
		<input type="hidden" name="action" value="register">
		<input class="submit" type="submit" name="submit" value="Register Me!">
	</form>

	<form class="index" action="process.php" method="post">
		<h1>Login</h1>
		<input type="text" name="email" placeholder="Email Address">
		<input type="password" name="password" placeholder="Password">
		<input type="hidden" name="action" value="login">
		<input class="submit" type="submit" name="submit" value="Log In!">
	</form>
</body>
</html>
<?php session_destroy(); ?>