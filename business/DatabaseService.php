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
    
    public function getUserId($username)
    {
        $result = "";
        
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("SELECT user_id FROM users WHERE user_name=?"))
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
    
    public function getUser($username) {
        $conn = $this->Connect();
        
        $result = null;
        
        if ($statement = $conn->prepare("SELECT * FROM users WHERE user_name=?")) {
            $statement->bind_param("s", $username);
            
            $statement->execute();
            
            $statement->bind_result($id, $username, $firstname, $lastname, $email, $address, $city, $state, $zipcode, $password);
            
            $statement->fetch();
            
            $result = new User($username, $password, $firstname, $lastname, $address, $city, $state, $zipcode, $email);
            
            $statement->close();
            
            return $result;
        }
    }
    
    public function updateUser($username, $first, $last, $email, $address, $city, $state, $zip, $password) {
        
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("UPDATE users SET first_name=?, last_name=?, email=?, address=?, city=?, state=?, zip_code=?, password=? WHERE user_name=?")) {
            $statement->bind_param("sssssssss",
                $first,
                $last,
                $email,
                $address,
                $city,
                $state,
                $zip,
                $password,
                $username);
            
            $statement->execute();
            
            $statement->close();
            
            return true;
        } else {
            return false;
        }
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
    
    public function deleteUser($username)
    {
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("DELETE FROM users WHERE user_name=?"))
        {
            $statement->bind_param("s", $username);
            
            $statement->execute();
            
            $statement->close();
        }
        
        $conn->close();
        
        return true;
    }
    
    public function getAllUsers() {
        $result = "";
        
        $limit = 10;
        $offset = 0;
        
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("SELECT * FROM users LIMIT ? OFFSET ?;"))
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
                
                while ($user = $result->fetch_assoc()) {
                    array_push($ary, $user);
                }
                
                $conn->close();
                
                return $ary;
            }
            
        }
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
        $r = "";
        
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("SELECT * FROM products WHERE id=?"))
        {
            $statement->bind_param("i", $id);
            
            $statement->execute();
            
            $result = $statement->bind_result($id, $name, $category, $description, $sku, $cost);
            
            $statement->fetch();
            
            $r = new Product($id, $name, $category, $description, $sku, $cost);
            
            $statement->close();
            $conn->close();
            
            return $r;
            
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
    
    public function updateProduct($name, $category, $description, $sku, $cost, $id) {
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("UPDATE products SET name=?, category=?, description=?, sku=?, cost=? WHERE id=?")) {
            $statement->bind_param("ssssdi", $name, $category, $description, $sku, $cost, $id);
            
            $statement->execute();
            
            $statement->close();
            
            return true;
        } else {
            return false;
        }
    }
    
    public function createProduct($name, $category, $description, $sku, $cost) {
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("INSERT INTO products (name, category, description, sku, cost) VALUES (?, ?, ?, ?, ?)")) {
            $statement->bind_param("ssssd", $name, $category, $description, $sku, $cost);
            
            $statement->execute();
            
            $statement->close();
            
            $conn->close();
            
            return true;
        } else {
            return false;
        }
    }
    
    public function deleteProduct($id) {
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("DELETE FROM products WHERE id=?")) {
            $statement->bind_param("i", $id);
            
            $statement->execute();
            
            $statement->close();
            
            $conn->close();
            
            return true;
        }
        
        return false;
    }
    
    public function addProductToCart($userid, $productid, $qty) {
        $conn = $this->Connect();
        
        if ($check_statement = $conn->prepare("SELECT * FROM usercarts WHERE product_id=?")) {
            $check_statement->bind_param("i", $productid);
            
            $check_statement->execute();
            
            $result = $check_statement->get_result();
            
            if ($result->num_rows == 0) {
                
                // Add new item
                if ($statement_new = $conn->prepare("INSERT INTO usercarts (user_id, product_id, qty) VALUES (?, ?, ?);")) {
                    $statement_new->bind_param("iii", $userid, $productid, $qty);
                    
                    $statement_new->execute();
                    
                    $statement_new->close();
                    
                    $conn->close();
                    
                    return true;
                } else {
                    return false;
                }
            } else {
                
                // Add qty
                if ($statement_update = $conn->prepare("UPDATE usercarts SET qty=? WHERE user_id=? AND product_id=?;")) {
                    $statement_update->bind_param("iii", $qty, $userid, $productid);
                    
                    $statement_update->execute();
                    
                    $statement_update->close();
                    
                    $conn->close();
                    
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
    
    public function getCart($userid) {
        $result = "";
        
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("SELECT * FROM usercarts WHERE user_id=?")) {
            $statement->bind_param("i", $userid);
            
            $statement->execute();
            
            $result = $statement->get_result();
            
            if (!$result) {
                echo "SQL Error";
                return false;
                exit;
            }
            
            if ($result->num_rows > 0) {
                $cart = Array();
                
                while ($productid = $result->fetch_assoc()) {
                    array_push($cart, $productid);
                }
                
                $conn->close();
                
                return $cart;
            }
        } else {
            return false;
        }
    }
    
    public function removeFromCart($userid, $productid) {
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("DELETE FROM usercarts WHERE user_id=? AND product_id=?")) {
            $statement->bind_param("ii", $userid, $productid);
            
            $statement->execute();
            
            $statement->close();
            
            $conn->close();
            
            return true;
        } else {
            return false;
        }
    }
    
    public function getFullCart($userid, $conn) {
        
        require_once '../models/Order.php';
        
        $conn = $this->Connect();
        
        $orderlist = array();
        
        if ($statement = $conn->prepare("SELECT * FROM usercarts WHERE user_id=?")) {
            $statement->bind_param("i", $userid);
            
            $statement->execute();
            
            $result = $statement->get_result();
            
            if (!$result) {
                return null;
                exit;
            }
            
            if ($result->num_rows > 0) {
                $ary = array();                
                
                while ($order = $result->fetch_assoc()) {
                    
                    $newOrder = new Order(
                        $order['user_id'],
                        $order['product_id'],
                        $order['qty']);
                    
                    array_push($orderlist, $newOrder);
                }
            }
            
            return $orderlist;
        }
    }
    
    public function emptyUserCart($userid, $conn) {
        
        if ($statement = $conn->prepare("DELETE FROM usercarts WHERE user_id=?;")) {
            $statement->bind_param("i", $userid);
            
            $statement->execute();
            
            if ($conn->errno) {
                return false;
            }
            
            return true;
        } else {
            return false;
        }
    }
    
    public function fillOrderHistory($order, $conn, $orderno) {
        if ($statement = $conn->prepare("INSERT INTO orderhistory (user_id, product_id, qty, order_number) VALUES (?, ?, ?, ?);")) {
            
            $userid = $order->getUser_id();
            $productid = $order->getProduct_id();
            $qty = $order->getQuantity();
            
            $statement->bind_param("iiii", $userid, $productid, $qty, $orderno);
            
            $statement->execute();
            
            if ($conn->errno) {
                return false;
            }
            
            return true;
        } else {
            return false;
        }
    }
    
    public function getOrderHistory($orderno) {
        
        require_once '../models/Order.php';
        
        $conn = $this->Connect();
        
        $orderlist = array();
        
        if ($statement = $conn->prepare("SELECT * FROM orderhistory WHERE order_number = ?")) {
            $statement->bind_param("i", $orderno);
            
            $statement->execute();
            
            $result = $statement->get_result();
            
            if (!$result) {
                return null;
                exit;
            }
            
            if ($result->num_rows > 0) {
                $ary = array();
                
                while ($order = $result->fetch_assoc()) {
                    
                    $newOrder = new Order(
                        $order['user_id'],
                        $order['product_id'],
                        $order['qty']);
                    
                    array_push($orderlist, $newOrder);
                }
            }
            
            return $orderlist;
        }
    }
    
    public function getReportByRange($startDate, $endDate) {
        $result = "";
        
        $conn = $this->Connect();
        
        if ($statement = $conn->prepare("SELECT * FROM orderhistory WHERE order_date BETWEEN ? AND ? ORDER BY qty DESC;"))
        {
            $statement->bind_param("ss", $startDate, $endDate);
            
            $statement->execute();
            
            $result = $statement->get_result();
            
            if (!$result) {
                echo "SQL Error 2";
                return null;
                exit;
            }
            
            if ($result->num_rows > 0) {
                $ary = array();
                
                while ($history = $result->fetch_assoc()) {
                    array_push($ary, $history);
                }
                
                $conn->close();
                
                return $ary;
            }
        }
    }
}
