<?php


class Logout
{
    public static function logoutUser(): void
    {
        unset($_SESSION["user"]);
        $_SESSION["user"] = null;
        unset($_COOKIE["uuid"]);
        setcookie("uuid", null, -1);
    }
}
