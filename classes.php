<?php

class DatabaseException extends Exception
{
    public function __construct($message = "Database error!", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

class RegistryValidation
{
    public function firstnameCheck($name)
    {
        if (!preg_match("/^[A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ ]*$/iu", $name)) {
            echo 'W imieniu dozwolone są tylko wielkie i małe litery!';
            return true;
        } elseif (empty($name)) {
            echo 'Podanie imienia jest wymagane!';
            return true;
        } else {
            return false;
        }
    }

    public function surnameCheck($surname)
    {
        if (!preg_match("/^[- A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ]*$/iu", $surname)) {
            echo 'W nazwisku dozwolone są tylko wielkie, małe litery oraz myślnik!';
            return true;
        } elseif (empty($surname)) {
            echo 'Podanie nazwiska jest wymagane!';
            return true;
        } else {
            return false;
        }
    }

    public function usernameCheck($username,$usernameArray)
    {
        if (in_array($username,$usernameArray)) {
            echo 'Wybrana nazwa użytkownika już istnieje!';
            return true;
        } else {
            return false;
        }
    }

    public function passwordCheck($password,$password_repeated)
    {
        if ($password !== $password_repeated) {
            echo 'Hasła różnią się!';
            return true;
        } elseif (strlen($password) < 10 || strlen($password_repeated) < 10) {
            echo 'Twoje hasło musi zawierać conajmniej 10 znaków!';
            return true;
        } elseif (strlen($password) > 50 || strlen($password_repeated) > 50) {
            echo 'Twoje hasło może zawierać maksymalnie 50 znaków!';
            return true;
        } elseif (!preg_match("#[0-9]+#", $password)) {
            echo 'Twoje hasło musi zawierać conajmniej 1 cyfrę!';
            return true;
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            echo 'Twoje hasło musi zawierać conajmniej 1 wielką literę!';
            return true;
        } elseif (!preg_match("#[a-z]+#", $password)) {
            echo 'Twoje hasło musi zawierać conajmniej 1 małą literę!';
            return true;
        } elseif (!preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $password)) {
            echo 'Twoje hasło musi zawierać conajmniej 1 znak specjalny!';
            return true;
        } else {
            return false;
        }
    }

    public function emailCheck($email,$emailArray)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Nieprawidłowy format email';
            return true;
        } elseif (in_array($email, $emailArray)) {
            echo 'Użytkownik o podanym emailu już istnieje!';
            return true;
        } else {
            return false;
        }
    }

    public function cityCheck($city)
    {
        if (empty($city)) {
            echo 'Podanie miasta jest wymagane!';
            return true;
        } elseif (!preg_match("/^[- A-PR-UWY-ZĄĆĘŁŃÓŚŹŻ ]*$/iu", $city)) {
            echo 'Miasto może zawierać wyłącznie wielkie i małe litery!';
            return true;
        } else {
            return false;
        }
    }

    public function zipcodeCheck($zipcode)
    {
        if (empty($zipcode)) {
            echo 'Podanie kodu pocztowego jest wymagane!';
            return true;
        } elseif (!preg_match("/^[0-9]{2}-[0-9]{3}$/", $zipcode)) {
            echo 'Nieprawidłowy kod pocztowy!';
            return true;
        } else {
            return false;
        }
    }

    public function addressCheck($address)
    {
        if (empty($address)) {
            echo 'Podanie adresu jest wymagane!';
            return true;
        } else {
            return false;
        }
    }
}
