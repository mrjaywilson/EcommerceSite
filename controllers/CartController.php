<?php session_start(); include '../business/DatabaseService.php'; 

$db = new DatabaseService('');

if (isset($_GET['productid'])) {
    
    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
    }
    
    if (isset($_GET['productid'])) {
        $productid = $_GET['productid'];
    }
    
    if (isset($_GET['qty'])) {
        $qty = $_GET['qty'];
    }
    
    if (isset($_GET['remove'])) {
        if (!$db->removeFromCart($userid, $productid)) {
            echo "failed remove";
        }
    } else {
        if (!$db->addProductToCart($userid, $productid, $qty)) {
            echo "failed add";
        }
    }

    header("LOCATION: ../views/UserCart.php");
}
