<?php

namespace Core\Auth;

use Core\Database\Database;

class DBAuth
{
    private Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getUserId()
    {
        if($this->isLogged()){
            return $_SESSION['auth'];
        }
        return null;
    }

    /*
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login(string $username, string $password): bool
    {
        $user = $this->db->prepare('select * from users where username=?', [$username]);
        if ($user[0]->password === sha1($password)) {
            $_SESSION['auth'] = $user[0]->id;
            return true;
        }
        return false;
    }

    public function isLogged(): bool
    {
        return isset($_SESSION['auth']);
    }
}