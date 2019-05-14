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
    
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }
    
    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
    
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    
    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    
    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
    
    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }
    
    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }
    
    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }
    
    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
}