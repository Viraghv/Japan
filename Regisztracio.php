<?php
require_once 'FormHandler/FormStateResponse.php';
require_once 'UserHandlers/Register.php';
require_once 'UserHandlers/Login.php';
include "Components/nav.php";
include "Components/header.php";

$registrationStatus = new FormStateResponse("Regisztrálj be", "Black");

if(isset($_POST["submit"])){
	$fnev = $_POST["fnev"];
	$passw = $_POST["passw"];
	$repassw = $_POST["repassw"];
	$age = $_POST["age"];
	$email = $_POST["email"];
	$nev = isset($_POST["nev"]) && $_POST["nev"] != "" ? $_POST["nev"] : "Felhasználó neve";
	$szuldatum = isset($_POST["szuldatum"]) && $_POST["szuldatum"] != "" ? $_POST["szuldatum"] : date('Y-m-d');
	$description = isset($_POST["description"]) && $_POST["description"] != "" ? $_POST["description"] : "";
	$nem = isset($_POST["nem"]) && $_POST["nem"] != "" ? $_POST["nem"] : "Egyéb";
	$tel = isset($_POST["tel"]) && $_POST["tel"] != "" ? $_POST["tel"] : "";
	$places = isset($_POST["places"]) && count($_POST["places"]) != 0 ? $_POST["places"] : ["Egyik sem"];
	$food = isset($_POST["food"]) && $_POST["food"] != "" ? $_POST["food"] : "Egyéb";
	$pfp_address = Register::setPfp($fnev);

	$requiredFields = Register::validateRequiredFields($fnev, $passw, $repassw, intval($age), $email);
	$optionalFields = Register::validateNotRequiredFields($nev, $szuldatum, $description, $pfp_address, $places);

if($requiredFields != "OK"){
	$registrationStatus->setText($requiredFields);
	$registrationStatus->setColor("Red");
} else if($optionalFields != "OK"){
	$registrationStatus->setText($optionalFields);
	$registrationStatus->setColor("Red");
} else {
	$newUser = new User($fnev, md5($passw), $email, $age, $nev, $szuldatum, $nem, $tel, $pfp_address, $description, $places, $food);
	try {
		Register::registerUser($newUser);
	} catch (Exception $exception){
		$registrationStatus->setText("Hiba a felhasználó regisztrálásakor");
		$registrationStatus->setColor("Red");
	}
	Login::staySignedIn(false, $newUser);
}
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<title>Regisztáció</title>
	<link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
</head>
<body>
<?php
	drawHeader();
	drawNavigation("REGISZTRÁCIÓ");
?>
<h1 style="text-align: center; color: <?= $registrationStatus->getColor() ?>;"><?= $registrationStatus->getText() ?></h1>
<form action="Regisztracio.php" method="post" enctype="multipart/form-data" autocomplete="off">
	<fieldset id="kotelezo">
		<legend>Kötelező adatok</legend>
		<label>Felhasználónév: <input type="text" name="fnev" /></label><br/>
		<label>Jelszó: <input type="password" name="passw" /></label><br/>
		<label>Jelszó újra: <input type="password" name="repassw" /></label><br/>
		<label>Kor: <input type="number" name="age" min="0" max="118"></label><br/>
		<label>E-mail-cím: <input type="email" name="email" placeholder="valami@gmail.com" /></label><br/>
	</fieldset>
	<fieldset id="egyeb">
		<legend>Egyéb</legend>
		<label>Teljes név: <input type="text" name="nev"/></label><br/>
		<label>Születési dátum: <input type="date" name="szuldatum"/></label><br/>

		Nem:
		<br/>
		<label>Férfi: <input type="radio" name="nem" value="Férfi"></label>
		<label>Nő: <input type="radio" name="nem" value="Nő"></label>
		<label>Egyéb: <input type="radio" name="nem" value="Egyéb" checked></label> <br/>

		<label>Telefonszám: <input type="tel" name="tel" placeholder="+06/12 345 6789" pattern="\+(06)\/[0-9]{2} [0-9]{3} [0-9]{4}"></label><br/>

		<label>Profilkép: <input type="file" name="pfp"></label>

		<label for="leiras">Profilod leírása (max. 300 karakter)</label><br/>
		<textarea id="leiras" rows="8" cols="40" maxlength="300" name="description"></textarea><br/

		Mely helyeken jártál már?
		<br/>
		<label>Fudzsi-hegy <input type="checkbox" name="places[]" value="Fudzsi-hegy" /></label> <br/>
		<label>Kioto <input type="checkbox" name="places[]" value="Kioto"/></label> <br/>
		<label>Himedzsi-várkastély <input type="checkbox" name="places[]" value="Himedzsi-várkastély"/></label> <br/>
		<label>Egyik sem <input type="checkbox" name="places[]" value="Egyik sem"></label><br/>

		<label>Kedvenc japán kajád:
			<select name="food">
				<option value="Sushi">Sushi</option>
				<option value="Ramen">Ramen</option>
				<option value="Soba">Soba</option>
				<option value="Udon">Udon</option>
				<option value="Tempura">Tempura</option>
				<option value="Mochi">Mochi</option>
				<option value="Egyéb" selected>Egyéb</option>
			</select>
		</label> <br/>
	</fieldset>
	<input type="submit" name="submit" value="Regisztráció" />
	<input type="reset" name="reset" value="Visszaállítás" />
</form>
<footer>
	<p>Készítette: <span style="text-shadow: 1px 1px black">Dékány Márk, Virágh Vivien</span></p>
</footer>
</body>
</html>
