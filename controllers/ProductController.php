<?php

session_start();

require_once '../models/Product.php';
require_once '../business/DatabaseService.php';

$db = new DatabaseService('');

if (isset($_GET['cancel'])) {

    header('Location: ../views/ProductManagement.php');

} else if (isset($_GET['update'])) {

    $db->updateProduct($_GET['name'], $_GET['category'], $_GET['description'], $_GET['sku'], $_GET['cost'], $_GET['id']);

    header('Location: ../views/ProductManagement.php');
    
} else if (isset($_GET['create'])) {

    $db->createProduct($_GET['name'], $_GET['category'], $_GET['description'], $_GET['sku'], $_GET['cost']);

    header('Location: ../views/ProductManagement.php');

} else if (isset($_GET['edit'])) {
    
    $id = strval($_GET['edit']);
    
    echo "<script>window.location = '../Views/EditProduct.php?product=" . $id ."'</script>";
    
} else if (isset($_GET['delete'])) {
    
    $id = strval($_GET['delete']);
    
    $db->deleteProduct($id);
    
    header('Location: ../views/ProductManagement.php');
} else if (isset($_GET['add'])) {
    
    $id = strval($_GET['add']);
    
    header('Location: ../views/AddProduct.php');
}
