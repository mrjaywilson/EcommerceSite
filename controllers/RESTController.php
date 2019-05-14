<?php session_start();

require_once '../business/RESTService.php';

$rs = new RESTService();

$_SESSION['JSON'] = $rs->generateJSON($_SESSION['StartDate'], $_SESSION['EndDate']);

header("Location: ../views/JSON.php");
