<?php

class Validator
{

    protected $min;
    protected $max;


    public function __construct($minPassLength, $maxPassLength)
    {
        $this->min = $minPassLength;
        $this->max = $maxPassLength;
    }

    protected function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    protected function checkPasswordMinLength($password)
    {
        //Set password minimum length
        if (strlen($password) < 5) {
            return false;
        } else return true;
    }

    protected function checkPasswordMaxLength($password)
    {
        //Set password max length
        if (strlen($password) > 20) {
            return false;
        } else return true;
    }

    public function checkBothPasswords($pass_1, $pass_2)
    {

        if ($pass_1 === $pass_2) {
            return true;
        }

    }







}