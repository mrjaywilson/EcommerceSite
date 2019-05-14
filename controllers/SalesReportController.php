<?php

session_start();

require_once '../business/DatabaseService.php';

if (isset($_GET['startdate']) && isset($_GET['enddate'])) {
    $_SESSION['StartDate'] = $_GET['startdate'];
    $_SESSION['EndDate'] = $_GET['enddate'];
    
    $db = new DatabaseService('');
    
    $_SESSION['ReportInfo'] = $db->getReportByRange($_SESSION['StartDate'], $_SESSION['EndDate']);
    
    header("Location: ../views/ReportResults.php");
}