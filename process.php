<?php
session_start();
require ('connection.php');

$_SESSION['regErr'] = array();
$errors = 0;

$encpass = password_hash("secret", PASSWORD_DEFAULT);
echo 'This is the hash: ' .$encpass. '<br>';

var_dump(password_verify('secret', $encpass));

if(isset($_POST['action']) && $_POST['action'] == "register") {
	if(is_numeric($_POST['first_name']) || strlen($_POST['first_name'])<3) {
		$_SESSION['regErr'][] = "Please enter a vaild first name";
		$errors++;
	}
	if(is_numeric($_POST['last_name']) || strlen($_POST['last_name'])<3) {
		$_SESSION['regErr'][] = "Please enter a vaild last name";
		$errors++;
	}
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$_SESSION['regErr'][] = 'Please enter a valid email';
		$errors++;
	}
	if (empty($_POST['password']) || ($_POST['password'] != $_POST['password2'])) {
		$_SESSION['regErr'][] = 'Please enter a vaild password';
		$errors++;
	}
	if($errors == 0) {
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$hash = crypt($_POST['password'], $salt);
		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) 
				  VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['email']."', '".$hash."', NOW(), NOW())";
		$result = run_mysql_query($query);
		if($result>0) {
			$user_id = $result;
			$_SESSION['user_id'] = $user_id;
			$_SESSION['first_name'] = $_POST['first_name'];
			header('location: wall.php');
			exit;
		} else {
			$_SESSION['regErr'][] = 'There was an error, please try again.';
		}
	}
	header('location: index.php');
	exit;

} elseif(isset($_POST['action']) && $_POST['action'] == 'login') {
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$_SESSION['logErr'][] = 'Please enter a valid email';
		$errors++;
	}
	if (empty($_POST['password'])) {
		$_SESSION['logErr'][] = 'Please enter a vaild password';
		$errors++;
	}
	if($errors == 0) {
		$query = "SELECT * FROM users WHERE email = '".$_POST['email']."'";
		$result = fetch_record($query);
		if($result != 0) {
			if(crypt($_POST['password'], $result['password'])== $result['password']){
				$_SESSION['user_id'] = $result['id'];
				$_SESSION['first_name'] = $result['first_name'];
				header('location: wall.php?id='.$result['id']);
				exit;
			} else {
				$_SESSION['logErr'][] = crypt($_POST['password'], $result['password']);
				$_SESSION['logErr'][] = 'Invalid email and password combination, please try again';
			}
		}
	}
	header('location: index.php');
	exit;

} elseif (isset($_GET['logout'])) {
	$_SESSION['logErr'][] = 'You have logged out.';
	header('location: index.php');
	exit;

} elseif(!empty($_POST['action']) && $_POST['action'] == 'message') {
	if(strlen($_POST['mess'])> 0) {
		$query = "INSERT INTO messages (user_id, message, created_at, updated_at)
				  VALUES ('".$_SESSION['user_id']."', '".$_POST['mess']."', NOW(), NOW())";
		$result = run_mysql_query($query);
		if($result == 0) {
			$_SESSION['errors'][] = 'There was an error, please try again';
		}
	} else {
		$_SESSION['messages'][] = 'You did not enter a vaild message.';
	}
	header('location: wall.php');
	exit;

} elseif(!empty($_POST['action']) && $_POST['action'] == 'comment') {
	if(strlen($_POST['comment'])>0) {
		$query = "INSERT INTO comments (message_id, user_id, comment, created_at, updated_at)
				  VALUES ('".$_POST['mid']."', '".$_SESSION['user_id']."', '".$_POST['comment']."', NOW(), NOW())";
		$result = run_mysql_query($query);
		if($result != 0) {
			unset($_SESSION['message_id']);
			header('location: wall.php');
			exit;
		} else {
			$_SESSION['errors'][] = 'There was an error, please try again';
		}
	}
}
?>