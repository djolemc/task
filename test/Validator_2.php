<?php

class Validator_2
{
    private $min;
    private $max;
    private $dbc;


    public function __construct($minPassLenth,$maxPassLength)
    {

        $this->min = $minPassLenth;
        $this->max = $maxPassLength;

        $dbh = DatabaseConnection::getInstance();
        $dbc= $dbh->getConnection();

        $this->dbc = $dbc;


    }

    public function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Valid email";
        } else {
            return "Invalid email";
        }
    }

    public function validatePassword($password)
    {

        if (strlen($password) < $this->min) {
            return "Password too short, minimum lenght is $this->min";
        }

        if (strlen($password) > $this->max) {
            return "Password too long, maximum lenght is $this->max";
        }

        if (!preg_match("/[^a-zA-Z0-9]+/", $password)) {
            return "Password have to contain at least one special character";
        }

        return "Password is valid";

    }

    public function checkPasswords($password_1, $password_2) {
        if ($password_1 !== $password_2) {
            return "Passwords are not the same";
        }
    }


    public function isRegistered($email)
    {
        $sql = ("select * from  users where email = :email ");
        $statement = $this->dbc->prepare($sql);
        $statement->execute([
            "email" => $email,

        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);


        if ($result) {
            return "User already registered";
        }
        else {
            return "User is not registered";
        }
    }

}