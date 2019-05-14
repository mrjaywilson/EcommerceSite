<?php

session_start();

require_once '../models/User.php';
require_once '../business/DatabaseService.php';

$db = new DatabaseService('');

if (isset($_GET['cancel'])) {
    header('Location: ../views/UserManagement.php');
} else if (isset($_GET['update'])) {
    $db->updateUser($_GET['username'], $_GET['first'], $_GET['last'], $_GET['email'], $_GET['address'], $_GET['city'], $_GET['state'], $_GET['zip'], $_GET['password']);
} else if (isset($_GET['create'])) {
    $db->CreateUser($_GET['username'], $_GET['password'], $_GET['first'], $_GET['last'], $_GET['email'], $_GET['address'], $_GET['city'], $_GET['state'], $_GET['zip']);
}

header('Location: ../views/UserManagement.php');