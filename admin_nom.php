<?php 
	
	/*
		Message à envoyer à l'utilisateur quand il est nommé administrateur 

	*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>

	<h1> Mail d'activation <h1>

	<?php echo "Bonjour ".strtoupper($row[2]).' '.ucfirst($row[3])."\n Votre compte vient d'être activé. Vous pouvez desomais <a href=\"http://localhost/projet/connexion.php\">vous connecter.</a>" ?>
</body>
</html>