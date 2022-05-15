<?php
session_start();

require_once 'UserHandlers/Logout.php';

Logout::logoutUser();

header('Location: Fooldal.php');
