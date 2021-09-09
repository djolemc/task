<?php

class ValidateMinimum implements ValidateRule
{
    private $minimum;

    public function __construct($minimum)
    {
        $this->minimum = $minimum;
    }

    function validateRule($value)
    {
        if (strlen($value) < $this->minimum) {
            return false;
        }
        return true;
    }

    function getErrorMessage()
    {
        return "Minimum value is less than " . $this->minimum;
    }
}