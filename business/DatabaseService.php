<?php

class DatabaseService
{
    var $dbServerName;
    
    public function __construct($dbServerName)
    {
        $this->dbServerName = $dbServerName;
    }
    
    public function Connect()
    {
        $conn = new mysqli("localhost:4406","cst236", "cst236_pass", "cst236");
        
        if (mysqli_connect_errno())
        {
            return false;
        }
        
        
        return $conn;
    }
    
    public function getPassword($username)
    {
        $result = "";
        
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("SELECT password FROM users WHERE user_name=?"))
        {
            $statement->bind_param("s", $username);
            $statement->execute();
            $statement->bind_result($temp);
            
            $statement->fetch();
            
            $result = $temp;
            
            $statement->close();
        }
        
        $conn->close();
        
        return $result;
    }
    
    public function CreateUser($username, $password, $firstName, $lastName, $email, $address, $city, $state, $zip)
    {
        $conn = $this->Connect();
        
        if ($statement = $conn->
            prepare("INSERT INTO users (user_name, first_name, last_name, email, address, city, state, zip_code, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"))
        {
            $statement->bind_param("sssssssss", $username, $firstName, $lastName, $email, $address, $city, $state, $zip, $password);
            
            $statement->execute();
            
            $statement->close();
        }
        
        $conn->close();
        
        return true;
    }
    
    public function getAllProducts($limit, $offset)
    {
        $result = "";
        
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("SELECT * FROM products LIMIT ? OFFSET ?;"))
        {
            $statement->bind_param("ii", $limit, $offset);
            
            $statement->execute();
            
            $result = $statement->get_result();
            
            if (!$result) {
                echo "SQL Error 2";
                return null;
                exit;
            }
            
            if ($result->num_rows > 0) {
                $ary = array();
                
                while ($product = $result->fetch_assoc()) {
                    array_push($ary, $product);
                }
                
                $conn->close();
                
                return $ary;
            }
            
        }
    }
    
    public function getProduct($id)
    {
        $result = "";
        
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("SELECT * FROM products WHERE id=?"))
        {
            $statement->bind_param("i", $id);
            
            $statement->execute();
            
            $result = $statement->get_result();
            
            if (!$result) {
                echo "SQL Error 2";
                return null;
                exit;
            }
            
            if ($result->num_rows > 0) {
                $ary = array();
                
                while ($product = $result->fetch_assoc()) {
                    array_push($ary, $product);
                }
                
                $conn->close();
                
                return $ary;
            }
        }
    }
    
    public function searchProducts($term)
    {
        $result = "";
        
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("SELECT * FROM products WHERE name LIKE ? OR description LIKE ?;"))
        {
            $term = "%" . $term . "%";
            $statement->bind_param("ss", $term, $term);
            
            $statement->execute();
            
            $result = $statement->get_result();
            
            if (!$result) {
                echo "SQL Error 2";
                return null;
                exit;
            }
            
            if ($result->num_rows > 0) {
                $ary = array();
                
                while ($product = $result->fetch_assoc()) {
                    array_push($ary, $product);
                }
                
                $conn->close();
                
                return $ary;
            }
            
        }
    }
}
