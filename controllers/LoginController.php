<?php

include_once "../views/layout/Header.php";
//require_once '../business/SecurityService.php';
require_once '../views/layout/AutoLoader.php';

$attemptedLoginName = $_POST['username'];
$attemptedPassword = $_POST['password'];

echo "You tried to login with " . $attemptedLoginName . " and " . $attemptedPassword;

$service = new SecurityService($attemptedLoginName, $attemptedPassword);

$loggedIn = $service->authenticate();

if ($loggedIn)
{
    $_SESSION['kavi'] = true;
    header("location: ../controllers/BrowseController.php");
}
else
{
    $_SESSION['kavi'] = false;
    include "../Views/LoginFailed.php";
}