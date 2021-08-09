<?php

class Validator
{

    public function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkPasswordMinLength($password)
    {
        //Set password minimum length
        if (strlen($password) < 5) {
            return false;
        } else return true;
    }

    public function checkPasswordMaxLength($password)
    {
        //Set password max length
        if (strlen($password) > 20) {
            return false;
        } else return true;
    }

    public function checkSpecialCharacters($password)
    {
        if (preg_match("/[^a-zA-Z0-9]+/", $password)) {
            return true;
        }

    }

    public function checkBothPasswords($pass_1, $pass_2)
    {

        if ($pass_1 === $pass_2) {
            return true;
        }

    }


}