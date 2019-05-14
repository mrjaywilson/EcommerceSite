<?php

include '../business/DatabaseService.php';
include '../models/User.php';

session_start();

$db = new DatabaseService('');

if (isset($_GET['edit'])) {
    $username = strval($_GET['edit']);
    
    echo "<script>window.location = '../Views/UserAccount.php?user=" . $username ."'</script>";
    
} else if (isset($_GET['delete'])) {
    $username = strval($_GET['delete']);
    
        $db->deleteUser($username);
        
        echo "<script>window.location = '../Views/UserManagement.php'</script>";
} else if (isset($_GET['create'])) {
    echo "<script>window.location = '../Views/AddUser.php'</script>";
}
    