<?php

require_once 'UserHandlers/Login.php';
require_once 'FormHandler/FormStateResponse.php';
include "Components/header.php";
include "Components/nav.php";

$loginStatus = new FormStateResponse("Jelentkezz be", "Black");
$justLoggedIn = false;
if(isset($_POST["submit"])){
	$userName = $_POST["fnev"];
	$password = $_POST["passw"];
	$staySignedIn = isset($_POST["staySignedIn"]) ? $_POST["staySignedIn"] : false;
	if(Login::validateInput($userName, $password) && Login::checkIfUserExists($userName, $password)) {
			$user = FileHandler::readUserFromFile($userName);
			Login::staySignedIn($staySignedIn, $user);
			$loginStatus->setText("Sikeres bejelentkezés!" . "<br />" . "<p style='text-align: center; font-size: 12px'>3 másodpercen belül tovább irányítunk a főoldalra</p>");
			$loginStatus->setColor("Green");
			$justLoggedIn = true;
			header("refresh:3;url=Fooldal.php");
	} else {
		$loginStatus->setText("Hibás vagy üres bemeneti mezők");
		$loginStatus->setColor("Red");
	}
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Belépés</title>
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
</head>
<body>
<?php
	drawHeader();
	drawNavigation("BEJELENTKEZÉS");

	if(isset($_SESSION["user"]) && !$justLoggedIn){
		echo "<h1 style='text-align: center'>Már be vagy jelentkezve</h1>";
		echo "<footer id=\"login-footer\">
			<p>Készítette: <span style=\"text-shadow: 1px 1px black\">Dékány Márk, Virágh Vivien</span></p>
			</footer>
			</body>
			</html>";
		exit();
	}
?>
<h1 style="text-align: center;color: <?= $loginStatus->getColor() ?>; "><?= $loginStatus->getText() ?></h1>
<div id="login-form">
	<form method="POST" enctype="multipart/form-data" autocomplete="off">
		<fieldset id="kotelezo">
			<legend>Bejelentkezés</legend>
			<label>Felhasználónév: <input type="text" name="fnev" /></label><br/>
			<label>Jelszó: <input type="password" name="passw" /></label><br/>
			<label>Maradjak bejelentkezve: <input type="checkbox" name="staySignedIn"></label>
			<label><input type="submit" value="Bejelentkezés" name="submit"></label>
		</fieldset>
	</form>
	<p id="regist-info">Nincs még fiókod? Regisztrálj <b><a href="Regisztracio.php">itt!</a></b></p>
</div>
<footer id="login-footer">
    <p>Készítette: <span style="text-shadow: 1px 1px black">Dékány Márk, Virágh Vivien</span></p>
</footer>
</body>
</html>
