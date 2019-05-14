<?php

include_once "../views/layout/_header.php";
require_once '../views/layout/AutoLoader.php';
require_once '../models/User.php';

$user = new User(
    $_POST['username'],
    $_POST['password'],
    $_POST['first'],
    $_POST['last'],
    $_POST['address'],
    $_POST['city'],
    $_POST['state'],
    $_POST['zip'],
    $_POST['email']
    );

$db = new DatabaseService("");

$db->CreateUser($user->username, $user->password, $user->firstName, $user->lastName, $user->address, $user->city, $user->state, $user->zipCode, $user->email);


header("Location: ../views/Login.php");