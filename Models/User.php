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

        return
    }


}