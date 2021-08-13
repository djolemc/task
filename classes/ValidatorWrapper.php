<?php

class ValidatorWrapper extends Validator
{

    private $errors = [];


    public function __construct($minPassLength, $maxPassLength)
    {
        parent::__construct($minPassLength, $maxPassLength);

    }


    public function validate($username,$password, $password_2)
    {

        //Check if mail is valid
        if (!$this->validateEmail($username)) {
            $this->errors['mail_error'] = 'Invalid email address';

        }

        //Check if both passwords match
        if (!$this->checkBothPasswords($password, $password_2)) {
            $this->errors['password_error'] = 'Passwords does not match';
            return false;
        }

        //Check password length

        if (!$this->checkPasswordMinLength($password)) {
            $this->errors['password_error'] = "Passwords minimum lenghth is $this->min characters";
            return false;
        }

        if (!$this->checkPasswordMaxLength($password)) {
            $this->errors['password_error'] = "Passwords minimum lenghth is $this->max characters";
            return false;
        }

        return true;

    }

    public function getErrors()
    {
        return $this->errors;
    }


}