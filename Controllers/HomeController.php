<?php

require_once 'Models/User.php';
require_once 'Controllers/Controller.php';


class HomeController extends Controller
{

    private $db;

    public function __construct()
    {
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $this->db = $dbc;
    }

    public static function show()
    {
        include 'Views/home.php';
    }


    public static function showRegisterForm()
    {
        include 'Views/register.php';
    }

    public static function showLoginForm()
    {
        include 'Views/login.php';
    }

    public function showResults()

    {
        if (isset($_SESSION['logged_in'])) {
            $search = $_POST['search'];
            $user = new User();
            $results = $user->findUsers($search);
            include 'Views/results.php';

        } else {
            $_SESSION['msg'] = "Please login";
            include 'Views/login.php';
        }
    }


}
