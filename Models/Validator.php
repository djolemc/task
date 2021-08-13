<?php

class Validator
{
    private $db;



    public function __construct()
    {
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $this->db = $dbc;
    }


//    public function validate()
//    {
//
//        unset($_SESSION['password_error']);
//        unset($_SESSION['mail_error']);
//
//        if ($this->isRegistered($_POST['email'])) {
//            $_SESSION['mail_error'] = 'User already registered!';
//            return false;
//        };
//
//        //Validate email
//
//        //Check if mail is valid
//        if (!$this->validateEmail($_POST['email'])) {
//            $_SESSION['mail_error'] = 'Invalid email address';
//            return false;
//        }
//
//        //Check if both passwords match
//        if ($_POST['password_1'] != $_POST['password_2']) {
//            $_SESSION['password_error'] = 'Passwords does not match';
//            return false;
//        }
//
//        //Check password lenth
//
//        if (!$this->validatePassword($_POST['password_1'])) {
//            $_SESSION['password_error'] = 'Passwords minimum lenghth is 5 characters';
//            return false;
//        }
//
//        return true;
//
//    }

    private function validateEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    private function validatePassword($password)
    {
        //Set password minimum length
        if (strlen($password) < 5) {
            return false;
        } else return true;
    }

    public function isRegistered($email)
    {
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $sql = ("select * from  users where email = :email ");
        $statement = $dbc->prepare($sql);
        $statement->execute([
            "email" => $email,

        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result) return true;
    }



}