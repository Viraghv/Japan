<?php

session_start();

require_once 'UserHandlers/User.php';
require_once 'FileHandler/FileHandler.php';

function drawHeader(){
    echo "<header>
    <audio controls>
        <source src=\"assets/bgm.mp3\" type=\"audio/mpeg\"/>
        <source src=\"assets/bgm.wav\" type=\"audio/wav\"/>
        Nem támogatott.
    </audio>
    <div id='header-container'>
        <img id=\"fejlec-kep\" src=\"assets/fejlec.jpg\" alt=\"Fejléc\"/>
        <a id='profil-link' href='" . (User::isLoggedIn() ? "Profil.php?page=1" : "Bejelentkezes.php") . "'>"
        . (User::isLoggedIn() ? unserialize($_SESSION["user"])->getUserName()  : "Nincs bejelentkezve") .
        "</a>
    </div>
</header>";
}

