<?php

require_once 'Models/User.php';

class UserController

{

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }




    public function register()
    {
        $user = new User($this->db);
        $user->createUser();
        var_dump($user);
        //TODO:
        //        $user->validate()
        $user->saveUser();



    }

}