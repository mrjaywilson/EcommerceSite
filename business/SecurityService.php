<?php

require_once 'DatabaseService.php';

class SecurityService
{
    private $password = "";
    private $username = "";

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function authenticate()
    {
        $db = new DatabaseService("localhost");

        if ($this->username == "" || $this->password == "")
        {
            return false;
        }

        if ($this->password == $db->getPassword($this->username))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}