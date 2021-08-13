<?php

interface ValidateRule {
    public function validateRule($value);
    public function getErrorMessage();
}