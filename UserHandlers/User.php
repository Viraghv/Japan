<?php

require_once 'FileHandler/FileHandler.php';
require_once 'Login.php';

class User
{
    private int $id;
    private string $registrationDate;
    private string $uuid;

    public function __construct(private string $userName,
                                private string $password,
                                private string $emailAddress,
                                private int $age,
                                private string $fullName = "",
                                private string $birthDate = "",
                                private string $gender = "Egyéb",
                                private string $phoneNumber = "",
                                private string $profilePictureAddress = "",
                                private string $description = "",
                                private array $visitedPlaces = [],
                                private string $favoriteFood = "")
    {
        $this->setId(FileHandler::getLastId());
        $this->setUserName($userName);
        $this->setPassword($password);
        $this->setEmailAddress($emailAddress);
        $this->setFullName($fullName);
        $this->setBirthDate($birthDate);
        $this->setAge($age);
        $this->setGender($gender);
        $this->setPhoneNumber($phoneNumber);
        $this->setProfilePictureAddress($profilePictureAddress);
        $this->setDescription($description);
        $this->setVisitedPlaces($visitedPlaces);
        $this->setFavoriteFood($favoriteFood);
        $this->setregistrationDate(date('Y-m-d H:i:s'));
        $this->uuid = uniqid();
    }

    public static function isLoggedIn(): bool
    {
        $user = isset($_SESSION["user"]) && !empty($_SESSION["user"]) ? $_SESSION["user"] : Login::loginUserWithStoredUuid();
        if($user != ""){
            return true;
        }
        return false;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $emailAddress): void
    {
        $this->emailAddress = $emailAddress;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function setBirthDate(string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getProfilePictureAddress(): string
    {
        return $this->profilePictureAddress;
    }

    public function setProfilePictureAddress(string $profilePictureAddress): void
    {
        $this->profilePictureAddress = $profilePictureAddress;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getVisitedPlaces(): array
    {
        return $this->visitedPlaces;
    }

    public function setVisitedPlaces(array $visitedPlaces): void
    {
        $this->visitedPlaces = $visitedPlaces;
    }

    public function getFavoriteFood(): string
    {
        return $this->favoriteFood;
    }

    public function setFavoriteFood(string $favoriteFood): void
    {
        $this->favoriteFood = $favoriteFood;
    }

    public function getRegistrationDate(): string
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(string $registrationDate): void
    {
        $this->registrationDate = $registrationDate;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

}
