<?PHP
session_start();
?>
<html>
	<head>
		
		<link rel="stylesheet" type="text/css" href="display.css">
	<head>
	<body class=body>
		<?PHP
		include("header.php");
		?>
		<div class=profildata>
		<?PHP
				if (!($tab = unserialize(file_get_contents("bdd/user"))))
					return 0;
				echo "login  :".$tab[$_SESSION["ID"]]["login"]."<br>";
				echo "email  :".$tab[$_SESSION["ID"]]["email"]."<br>";
				echo "phone  :".$tab[$_SESSION["ID"]]["phone"]."<br>";
				echo "adress:".$tab[$_SESSION["ID"]]["adress"]."<br>";
			include("form_mod_user_passwd.php");
		?>
		</div>
	</body>
</html>
