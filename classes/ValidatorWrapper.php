<?php

require_once 'classes/Validator.php';

class ValidatorWrapper extends Validator
{


    public function __construct($minPassLenth, $maxPassLength)
    {
        parent::__construct($minPassLenth, $maxPassLength);
    }


    public function validate()
    {

        unset($_SESSION['password_error']);

        //Check if mail is valid
        if (!$this->validateEmail($_POST['email'])) {
            $_SESSION['mail_error'] = 'Invalid email address';
            return false;
        }

        //Check if both passwords match
        if (!$this->checkBothPasswords($_POST['password_1'], $_POST['password_2'])) {
            $_SESSION['password_error'] = 'Passwords does not match';
            return false;
        }

        //Check password lenth

        if (!$this->checkPasswordMinLength($_POST['password_1'])) {
            $_SESSION['password_error'] = "Passwords minimum lenghth is $this->min characters";
            return false;
        }

        if (!$this->checkPasswordMaxLength($_POST['password_1'])) {
            $_SESSION['password_error'] = "Passwords minimum lenghth is $this->max characters";
            return false;
        }

        return true;

    }


}