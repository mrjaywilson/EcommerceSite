<?php session_start();

//require_once '../business/SecurityService.php';
require_once '../views/layout/AutoLoader.php';

$attemptedLoginName = $_POST['username'];
$attemptedPassword = $_POST['password'];

$service = new SecurityService($attemptedLoginName, $attemptedPassword);

$loggedIn = $service->authenticate();

$db = new DatabaseService('');

if ($loggedIn)
{
    $_SESSION['KAVI'] = true;
    $_SESSION['userid'] = $db->getUserId($attemptedLoginName);
    
    header("location: ../views/BrowseProducts.php");
}
else
{
    $_SESSION['kavi'] = false;
    include "../Views/LoginFailed.php";
}