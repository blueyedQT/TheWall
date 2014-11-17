<?php 
session_start();
var_dump($_SESSION);
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
	<p class="header">Welcome <?= $_SESSION['first_name'] ?></p>
	<a href="#">Logout</a>
	<h2>Post a message</h2>
	<textarea></textarea>
	<input class="button" type="submit" name="message" value="Post a message">
	<div class="message">
		<h3>Michael Choi - January 23rd, 2013</h3>
		<p>
			Confidam sit contumax meo res timerent utrimque parentes. Spectentur notionibus ego imaginandi imaginarer tantummodo hoc sum. Liceat rum juncta notior platea res. Ii bile nolo eram vidi scio to id. Negavi sensum agi falsis sed ignota sua vix. At ei idcirco co at motarum figuras divinae reddere. Obnoxius im animalia ferventi ad de callidum. 
		</p>
		<div class="comment">
			<h4>Katrina Sanford - Feb 1st 2013</h4>
			<p>
				Liceat rum juncta notior platea res. Ii bile nolo eram vidi scio to id. Negavi sensum agi falsis sed ignota sua vix.
			</p>
		</div>
		<div class="comment">
			<h4>Katrina Sanford - Feb 1st 2013</h4>
			<p>
				Liceat rum juncta notior platea res. Ii bile nolo eram vidi scio to id. Negavi sensum agi falsis sed ignota sua vix.
			</p>
		</div>
		<div class="comment">
			<h4>Katrina Sanford - Feb 1st 2013</h4>
			<p>
				Liceat rum juncta notior platea res. Ii bile nolo eram vidi scio to id. Negavi sensum agi falsis sed ignota sua vix.
			</p>
		</div>
	</div>
	<div class="message">
		<h3>Corey Whitelord - January 10th, 2013</h3>
		<p>
			Confidam sit contumax meo res timerent utrimque parentes. Spectentur notionibus ego imaginandi imaginarer tantummodo hoc sum. Liceat rum juncta notior platea res. Ii bile nolo eram vidi scio to id. Negavi sensum agi falsis sed ignota sua vix. At ei idcirco co at motarum figuras divinae reddere. Obnoxius im animalia ferventi ad de callidum. 
		</p>
		<div class="comment">
			<h4>Katrina Sanford - Feb 1st 2013</h4>
			<p>
				Liceat rum juncta notior platea res. Ii bile nolo eram vidi scio to id. Negavi sensum agi falsis sed ignota sua vix.
			</p>
		</div>
	</div>
	<div class="message">
		<h3>Katrina Sanfpord - January 1st, 2013</h3>
		<p>
			Confidam sit contumax meo res timerent utrimque parentes. Spectentur notionibus ego imaginandi imaginarer tantummodo hoc sum. Liceat rum juncta notior platea res. Ii bile nolo eram vidi scio to id. Negavi sensum agi falsis sed ignota sua vix. At ei idcirco co at motarum figuras divinae reddere. Obnoxius im animalia ferventi ad de callidum. 
		</p>
	</div>
</body>
</html>