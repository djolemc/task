<?php

//require_once '../source/ValidateRule.php';

class ValidateEmail implements ValidateRule
{
    function validateRule($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }


    function getErrorMessage(){
        return "Email format is not correct.";
    }
}