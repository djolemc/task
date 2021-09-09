<?php

class Controller
{

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    function runAction($actionName)
    {
        if (method_exists($this, $actionName)) {
            $this->$actionName();
        } else {
            include 'Views/404.php';
        }
    }
}