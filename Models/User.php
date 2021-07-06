<?php

class User {

    private $email;
    private $name;
    private $password;
    private $db;


    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createUser() {

        $this->email = $_POST['email'];
        $this->name = $_POST['name'];
        $this->password = $_POST['password_1'];
    }

    public function saveUser()
    {

        $sql = ("insert into users (email, name, password) values (:email, :name, :password);");
        $statement = $this->db->prepare($sql);
        $statement->execute([
            "email" => $this->email,
            "name" =>$this->name,
            "password" =>$this->password,
        ]);

        //TODO login registered user and redirect home

    }

    public function getUserName()
    {
        return $this->name;
    }

    public function loginUser($email,$password) {

        $sql = ("select * from  users where email = :email and password = :password");
        $statement = $this->db->prepare($sql);
        $statement->execute([
            "email" => $email,
            "password" =>$password,
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $this->name = $result['name'];
            $this->email = $result['email'];

            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $this->name;
            $_SESSION['user_email'] = $this->email;

            return true;

        }






    }


}