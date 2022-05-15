<?php

require_once 'FileHandler/FileHandler.php';

define("MINIMUM_AGE", 12);
define("MAXIMUM_AGE", 118);
define("MINIMUM_PASSWORD_LENGTH", 5);

class Register
{

    public static function registerUser(object $user): void
    {
            FileHandler::writeUserToFile($user);
    }

    public static function checkIfUserWithNameOrEmailExists(string $userName = "", string $email = ""): bool
    {
        if($userName != ""){
            $user = FileHandler::readUserFromFile($userName);
            if(count((array)$user) == 0){
                return true;
            }
            return false;
        } else {
            $user = FileHandler::readUserFromFile(email:$email);
            if(count((array)$user) == 0){
                return true;
            }
            return false;
        }
    }

    public static function validateRequiredFields(string $userName,
                                                  string  $password,
                                                  string $rePassword,
                                                  int $age,
                                                  string $emailAddress): string
    {
        $emptyParamError = self::checkIfParamsAreEmpty(func_get_args());
        if($emptyParamError != ""){
            return $emptyParamError;
        }

        //a jelszó legalább 5 karakter hosszú
        if(strlen($password) < MINIMUM_PASSWORD_LENGTH){
            return "A jelszónak legalább 5 karakternek kell lennie";
        }

        //a két jelszó egyezik-e
        if($password != $rePassword){
            return "A 2 megadott jelszó nem egyezik";
        }

        //a felhasználónévnek egyedinek kell lennie
        if(!self::checkIfUserWithNameOrEmailExists($userName)){
            return "Felhasználónév foglalt";
        }

        //legalább 12 éves, legfeljebb 118
        if($age < MINIMUM_AGE){
            return "Legalább 12 évesnek kell lenned";
        } else if($age > MAXIMUM_AGE){
            return "Maximum 118 éves lehetsz";
        }

        //érvényes email cím formátumot kell megadni
        if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){
            return "Hibás E-Mail-cím formátum";
        }

        //az email címnek egyedinek kell lennie
        if(!self::checkIfUserWithNameOrEmailExists(email:$emailAddress)){
            return "Email foglalt";
        }

        return "OK";
    }

    public static function validateNotRequiredFields(string $fullName, string $dateOfBirth, string $description, string $pfp_address, array $places): string
    {
        $fullNameRe = '/( )./m';
        preg_match_all($fullNameRe, $fullName, $match, PREG_SET_ORDER, 0);
        if(count($match) == 0){
            return "Érvénytelen teljes név";
        }

        if($dateOfBirth < '1900-01-01' || $dateOfBirth > date('Y-m-d')){
            return "Érvénytelen születési idő";
        }

        if(strlen($description) > 300){
            return "A leírás túl hosszú";
        }

        switch ($pfp_address){
            case "move_err": return "A fájl mozgatása nem sikerült"; break;
            case "size_err": return "A fájl mérete túl nagy (max. 5 MB)"; break;
            case "unsuccessful_err": return "A fájlfeltöltés nem sikerült"; break;
            case "extension_err": return "A fájl csak jpg, jpeg, vagy png lehet"; break;
            default: break;
        }

        if(count($places) > 1){
            for($i = 0; $i < count($places); $i++){
                if($places[$i] == "Egyik sem"){
                    unset($places[$i]);
                }
            }
        }

        return "OK";
    }

    public static function setPfp (string $fnev): string {
        if(isset($_FILES["pfp"]) && !empty($_FILES["pfp"]["name"])) {
            $allowed_extensions = ["jpg", "jpeg", "png"];
            $extension = strtolower(pathinfo($_FILES["pfp"]["name"], PATHINFO_EXTENSION));

            if(in_array($extension, $allowed_extensions)){
                if($_FILES["pfp"]["error"] === 0){
                    if($_FILES["pfp"]["size"] <= 5242880){     //a fájlméret nem nagyobb 5 MB-nál
                        $address = "profile_pictures/".$fnev.".".$extension;
                        if(move_uploaded_file($_FILES["pfp"]["tmp_name"], $address)){
                            return $address;
                        } else {
                            return "move_err";
                        }
                    } else {
                        return "size_err";
                    }
                } else {
                    return "unsuccessful_err";
                }
            } else {
                return "extension_err";
            }
        } else {
            return "profile_pictures/default.png";
        }
    }

    private static function getParamName(int $id): string
    {
        switch ($id){
            case 0: return "Felhasználónév";
            case 1: return "Jelszó";
            case 2: return "Jelszó újra";
            case 3: return "Kor";
            case 4: return "E-mail-cím";
            default: return "";
        }
    }

    private static function checkIfParamsAreEmpty(array $params): string
    {
        $currentParam = 0;
        foreach ($params as $param){
            if($param == null  || trim($param) == ""){
                return "Üres mező:" . self::getParamName($currentParam);
            }
            $currentParam++;
        }
        return "";
    }

}
