<?php
/**
 * Created by PhpStorm.
 * User: mrjay
 * Date: 4/7/2019
 * Time: 9:53 PM
 */

class User
{
    public $username;
    public $password;
    public $firstName;
    public $lastName;
    public $address;
    public $city;
    public $state;
    public $zipCode;
    public $email;

    public function __construct($username, $password, $firstName, $lastName, $address, $city, $state, $zipCode, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->email = $email;
    }
}