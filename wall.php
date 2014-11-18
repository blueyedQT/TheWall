<?php 
session_start();
require('connection.php');
// var_dump($_SESSION);
// if(empty($_SESSION['user'])) {
// 	$_SESSION['user'] = $_GET['id'];
// } else {
// }

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CodingDojo Wall</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<h1>CodingDojo Wall</h1>
	<?php
	if(isset($_SESSION['first_name']) && isset($_SESSION['user_id'])){ ?>
	<p class="header">Welcome <?= $_SESSION['first_name'] ?></p>
	<a href="process.php?logout=y">Logout</a>
	<form class="message" action="process.php" method="post">
		<h2>Post a message</h2>
		<textarea name="mess"></textarea>
		<input type="hidden" name="action" value="message">
		<input class="button" type="submit" name="message" value="Post a message">
	</form>
	<?php 
	} else { ?>
	<p class="header">Login to be able to post messages and comment</p>
	<a href="index.php">Login!</a>
	<?php
	}
		$query = "SELECT CONCAT_WS(' ', first_name, last_name) AS name, message, DATE_FORMAT(messages.created_at, '%M %D %Y') AS dc, messages.id AS message_id FROM messages 
				  LEFT JOIN users 
				  ON messages.user_id = users.id
				  ORDER BY messages.created_at DESC";
		$results = fetch_all($query);
		// var_dump($results);
		foreach($results as $result) { 
			$mid = $result['message_id']; ?>
		<div class="message">
			<h3><?= $result['name'].' - '.$result['dc'] ?></h3>
			<p><?= $result['message'] ?></p>
			<?php
			$query2 = "SELECT CONCAT_WS(' ', first_name, last_name) AS cName, comments.created_at AS cdc, comment FROM comments
					   LEFT JOIN users
					   ON comments.user_id = users.id
					   WHERE message_id='".$result['message_id']."'";
			$results2 = fetch_all($query2);
			// var_dump($results2);
			foreach($results2 as $row2) { ?>
			<div class="comment">
				<h4><?= $row2['cName'].' - '.$row2['cdc'] ?></h4>
				<p><?= $row2['comment'] ?></p>
			</div>
			<?php
			}
			if(isset($_SESSION['first_name']) && isset($_SESSION['user_id'])) { ?>
			<form class="wall" action="process.php" method="post">
				<textarea class="commentText" name="comment"></textarea>
				<input type="hidden" name="mid" value="<?= $result['message_id'] ?>">
				<input type="hidden" name="action" value="comment">
				<input type="submit" name="submit" value="Add Comment!">
			</form>
			<?php } ?>
		</div>
		<?php 
		} ?>
</body>
</html>