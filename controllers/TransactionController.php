<?php

require_once '../business/DatabaseService.php';

$db = new DatabaseService('');

if (isset($_GET['userid'])) {
    
    $userid = $_GET['userid'];
    
    $conn = $db->Connect();
    
    $orderlist = $db->getFullCart($userid, $conn);
    
    $conn->autocommit(FALSE);
    $conn->begin_transaction();
    
    $empty = $db->emptyUserCart($userid, $conn);
    
    $orderno = rand(10000, 99999);
    
    foreach ($orderlist as $order) {
        $history = $db->fillOrderHistory($order, $conn, $orderno);
    }
    
    if ($empty && $history) {
        echo "COMITTING!";
        
        $conn->commit();
    } else {
        echo "NOT COMITTING!";
        
        $conn->rollback();
    }
    
    $conn->close();
    
    header("Location: ../views/FinalReceipt.php?orderno=" . $orderno);
} else {
    echo "ERROR!";
}