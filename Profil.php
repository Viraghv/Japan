<?php
include "Components/header.php";
include "Components/nav.php";

?>
<!doctype html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profil</title>
	<link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
</head>
<body>
<?php
	drawHeader();
	drawNavigation("");
	$user = unserialize($_SESSION["user"]);
	$currentPageIsOne = $_GET["page"] == 1;

?>
	<a id="profil-oldalak" href="Profil.php?page=<?= $currentPageIsOne ?  2 :  1 ?>"><?= !$currentPageIsOne ?  "Kötelező adatok" :  "Opcionális adatok" ?></a>
	<table id="profil-adatok">
		<caption><?= $currentPageIsOne ?  "Kötelező adatok" :  "Opcionális adatok" ?></caption>
		<tbody>
		<?php
		if($currentPageIsOne){
			?>
			<tr>
				<th>Profilkép</th>
				<td><img src="<?= $user->getProfilePictureAddress()?>" alt='profil kep'></td>
			</tr>
			<tr>
				<th>Felhasználónév</th>
				<td><?= $user->getUserName()?></td>
			</tr>
			<tr>
				<th>Email-cím</th>
				<td><?= $user->getEmailAddress()?></td>
			</tr>
			<tr>
				<th>Kor</th>
				<td><?= $user->getAge()?></td>
			</tr>
		<?php
		} else if(!$currentPageIsOne || $_GET["page"] == 2){
			?>
			<tr>
				<th>Név</th>
				<td><?= $user->getFullName()?></td>
			</tr>
			<tr>
				<th>Születési dátum</th>
				<td><?= $user->getBirthDate()?></td>
			</tr>
			<tr>
				<th>Nem</th>
				<td><?= $user->getGender()?></td>
			</tr>
			<tr>
				<th>Telefonszám</th>
				<td><?= $user->getPhoneNumber()?></td>
			</tr>
			<tr>
				<th style="vertical-align: top">Leírás</th>
				<td><?= $user->getDescription()?></td>
			</tr>
			<tr>
				<th>Kedvenc kaja</th>
				<td><?= $user->getFavoriteFood()?></td>
			</tr>
			<tr>
				<th>Meglátogatott helyek</th>
				<td><?php echo implode(', ', $user->getVisitedPlaces()) ?></td>
			</tr>
		<?php
		}
		?>
		</tbody>
	</table>
</body>
</html>
