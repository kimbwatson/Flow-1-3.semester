<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="stylesheet.css">
<title>Opret login</title>
</head>

	<body>
	
<div class="container content">
<p>
	<form class="form center" action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
		<fieldset class="style">
			<legend>Ny bruger</legend>
				<input class="un" name="un" type="username" placeholder="Brugernavn" required/>
				<input class="pw "name="pw" type="password" placeholder="Password" required/>
				<input class="knap" name="submit" type="submit" value="Opret bruger"/>
			
		</fieldset>
		
		
	</form>
	</p>
	<?php
		
	
	if(filter_input(INPUT_POST, 'submit')) {
		$un = filter_input(INPUT_POST, 'un') 
			or die('<div class="output">Mangler brugernavn</div>');
		$pw = filter_input(INPUT_POST, 'pw') 
			or die('<div class="output">Mangler password</div>');
		$pw = password_hash($pw, PASSWORD_DEFAULT);
		
			echo '<div class="output">Bruger '.$un.' oprettet!<br></div>';
		
		require_once('db_con.php');
		
		$sql = 'INSERT INTO users (username, pwhash) values (?, ?)';
		$stmt = $con->prepare($sql);
		$stmt->bind_param('ss', $un, $pw);
		$stmt->execute();
			if($stmt->affected_rows > 0){
				echo '<div class="output"><a href="login.php">Gå til loginside</a></div>';
			}
				else {
					echo '<div class="output"><br>Kunne ikke oprette bruger</div>';
				}
	}
	?>

	</div>
	

</body>
</html>