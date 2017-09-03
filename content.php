<?php 
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="stylesheet.css">
<title>Content</title>
</head>

<body>
<div class="">
  <?php
	if(empty($_SESSION['uid'])){
		echo 'Du skal logge ind først';
	}
	else {
		echo '<div class="output top center">Velkommen '.$_SESSION['un'].'<br><img src="photo.jpg" alt="Mountain View" style="width:500px;height:400px;"></div><div class="output"><a href="logout.php">Log out?</a></div>';
	}
?>
	
</body>
</html>