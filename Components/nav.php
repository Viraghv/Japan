<?php
function drawNavigation($currentSite){
    $isLoggedIn = isset($_COOKIE["uuid"]) || isset($_SESSION["user"]);
    $navLinks = [
        [
            "file" => "Fooldal.php",
            "linkName" => "KEZDŐLAP",
        ],
        [
            "file" => "Fudzsi-hegy.php",
            "linkName" => "FUDZSI-HEGY",
        ],
        [
            "file" => "Kioto.php",
            "linkName" => "KIOTO",
        ],
        [
            "file" => 	"Himedzsi-varkastely.php",
            "linkName" => "HIMEDZSI VÁRKASTÉLY",
        ],
        [
            "file" => "Regisztracio.php",
            "linkName" => $isLoggedIn ? null : "REGISZTRÁCIÓ",
        ],
        [
            "file" => $isLoggedIn ? "Kijelentkezes.php" : "Bejelentkezes.php",
            "linkName" => $isLoggedIn ? "KIJELENTKEZÉS" : "BEJELENTKEZÉS",
        ],
    ];
	echo "<nav>";
    echo "<ul id=\"menu\">";
    foreach ($navLinks as $navLink){
        if(!is_null($navLink["linkName"])){
            echo "<li" . ($currentSite ==$navLink["linkName"] ? " id=\"aktualis\"" : " ")  . "class=\"menubar\"><a  class=\"menulink\" href=\"" . $navLink["file"] ."\">" . $navLink["linkName"] ."</a></li>";
        }
	}
    echo "</ul>";
	echo "</nav>";
}

