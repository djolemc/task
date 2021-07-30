<?php


class User
{

    private $email;
    private $name;
    private $password;
    private $db;


    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createUser()
    {
        $this->email = $_POST['email'];
        $this->name = $_POST['name'];
        $this->password = $_POST['password_1'];
    }


    public function saveUser()
    {
        $hash = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = ("insert into users (email, name, password) values (:email, :name, :password);");
        $statement = $this->db->prepare($sql);
        $statement->execute([
            "email" => $this->email,
            "name" => $this->name,
            "password" => $hash,
        ]);

    }

    public function loginUser($email, $password)
    {

        $sql = ("select * from  users where email = :email");
        $statement = $this->db->prepare($sql);
        $statement->execute([
            "email" => $email,
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (password_verify($password, $result['password'])) {
                $this->name = $result['name'];
                $this->email = $result['email'];
                $_SESSION['logged_in'] = true;
                $_SESSION['user'] = $this->name;
                $_SESSION['user_email'] = $this->email;
                return true;
            }
        }
    }


    /*
     * Find user by name or email
     * return array
     */

    public function findUsers(): array
    {
        $searchTerm = $_POST['search'];

        if (strlen($searchTerm) < 1) return [];
        $sql = ("select email, name from  users where email like :email or name like :name ");
        $statement = $this->db->prepare($sql);
        $statement->execute([
            "email" => '%' . $searchTerm . '%',
            "name" => '%' . $searchTerm . '%',
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }






}