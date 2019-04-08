<?php

include_once "../views/layout/Header.php";
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
//
//echo "You registered with: <br />"
//    .$user->username . "<br />"
//    .$user->password . "<br />"
//    .$user->firstName . "<br />"
//    .$user->lastName . "<br />"
//    .$user->email . "<br />"
//    .$user->address . "<br />"
//    .$user->city . "<br />"
//    .$user->state . "<br />"
//    .$user->zipCode;

$db = new DatabaseService("");

$db->CreateUser($user->username, $user->password, $user->firstName, $user->lastName, $user->address, $user->city, $user->state, $user->zipCode, $user->email);


header("Location: ../views/login.php");

//echo "<br/><br/>";

//echo $db->getPassword($user->username);