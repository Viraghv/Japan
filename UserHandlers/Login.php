<?php
require_once 'Register.php';

class Login
{
    public static function checkIfUserExists(string $userName, string $password): bool
    {
        if(!Register::checkIfUserWithNameOrEmailExists($userName)) {
            $user = FileHandler::readUserFromFile((FileHandler::readUserFromFile($userName))->getUserName());
            if(count((array)$user) > 0){
                if(md5($password) == $user->getPassword()){
                    return true;
                }
            }
        }
        return false;
    }

    public static function staySignedIn(bool $staySignedIn, object $user): void
    {
            if($staySignedIn){
                setcookie("uuid", $user->getUuid(), time() + 60 * 60 * 24 * 7); //1 hétre tárolja a sütit
                $_SESSION["user"] = serialize(FileHandler::readUserFromFile(uuid:$user->getUuid()));
                return;
            }
            $_SESSION["user"] = serialize(FileHandler::readUserFromFile(uuid:$user->getUuid()));
    }

    public static function loginUserWithStoredUuid(): string
    {
        if(isset($_COOKIE["uuid"])){
            $_SESSION["user"] = serialize(FileHandler::readUserFromFile(uuid:$_COOKIE["uuid"]));
            return $_SESSION["user"];
        } else {
            return "";
        }
    }

    public static function validateInput(mixed ...$fields): bool
    {
        foreach ($fields as $field){
            if($field == null){
                return false;
            }
            $field = trim($field);
            if(strlen($field) == 0){
                return false;
            }
        }
        return true;
    }

}
