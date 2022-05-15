<?php
define("FILE_NAME", "users/users.csv");

require_once 'UserHandlers/User.php';

class FileHandler
{

    public static function writeUserToFile(object $userData): void
    {
        self::checkIfFileExists();
        $file = fopen(FILE_NAME, "a");
        fwrite($file, serialize($userData) . "\n");
        fclose($file);
    }

    public static function readUserFromFile($userName = "", $uuid = "", $email = ""): object
    {
        self::checkIfFileExists();
        $file = fopen(FILE_NAME, "r");
        while (!feof($file)) {
            $currentLine = fgets($file);
            if ($currentLine == "") {
                break;
            }
            $unsterilizedCurrentLine = unserialize($currentLine);
            if ($userName != "") {
                if ($unsterilizedCurrentLine->getUserName() === $userName) {
                    fclose($file);
                    return $unsterilizedCurrentLine;
                }
            } else if ($uuid != "") {
                if ($unsterilizedCurrentLine->getUuid() === $uuid) {
                    fclose($file);
                    return $unsterilizedCurrentLine;
                }
            } else if ($email != "") {
                if ($unsterilizedCurrentLine->getEmailAddress() === $email) {
                    fclose($file);
                    return $unsterilizedCurrentLine;
                }
            }
        }
        fclose($file);
        return new stdClass();
    }

    public static function getLastId(): int
    {
        $lastLine = '';
        self::checkIfFileExists();
        $file = fopen(FILE_NAME, 'r');
        $cursor = -1;
        fseek($file, $cursor, SEEK_END);
        $char = fgetc($file);

        while ($char === "\n" || $char === "\r") {
            fseek($file, $cursor--, SEEK_END);
            $char = fgetc($file);
        }
        while ($char !== false && $char !== "\n" && $char !== "\r") {
            $lastLine = $char . $lastLine;
            fseek($file, $cursor--, SEEK_END);
            $char = fgetc($file);
        }
        if ($lastLine == "") {
            return 0;
        }
        return unserialize($lastLine)->getId() + 1;
    }

    private static function checkIfFileExists(): void
    {
        if (!file_exists(FILE_NAME)) {
            mkdir('users');
            $file = fopen(FILE_NAME, 'w');
            fclose($file);
        }
    }

}
