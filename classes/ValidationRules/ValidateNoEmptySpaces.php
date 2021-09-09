<?php

class ValidateNoEmptySpaces implements ValidateRule

{

    function validateRule($value)
    {
        if (strpos($value, ' ') === false) {
            return true;
        }
        return false;
    }

    function getErrorMessage()
    {
        return "No empty spaces allowed.";
    }

}