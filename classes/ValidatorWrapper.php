<?php

class ValidatorWrapper extends Validator
{


    public function __construct($minPassLength, $maxPassLength)
    {
        parent::__construct($minPassLength, $maxPassLength);
    }


    public function validate($username,$password, $password_2)
    {

        unset($_SESSION['password_error']);

        //Check if mail is valid
        if (!$this->validateEmail($username)) {
            $_SESSION['mail_error'] = 'Invalid email address';
            return false;
        }

        //Check if both passwords match
        if (!$this->checkBothPasswords($password, $password_2)) {
            $_SESSION['password_error'] = 'Passwords does not match';
            return false;
        }

        //Check password length

        if (!$this->checkPasswordMinLength($password)) {
            $_SESSION['password_error'] = "Passwords minimum lenghth is $this->min characters";
            return false;
        }

        if (!$this->checkPasswordMaxLength($password)) {
            $_SESSION['password_error'] = "Passwords minimum lenghth is $this->max characters";
            return false;
        }

        return true;

    }


}