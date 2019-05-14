<?php

require_once '../business/DatabaseService.php';

include '../views/layout/_menu.php';

echo "<h2>Browse Products</h2>";

echo "<br/>";

echo "<form action='BrowseController.php'>";
echo "Search: <input type='text' name='search'> &nbsp;&nbsp; <input type='submit' value='Search'></input>";
echo "</form>";

echo "<br/>";

$databaseService = new DatabaseService('');

if (isset($_GET['page'])) {
    $page = $_GET['page'] + 10;
    $products = $databaseService->getAllProducts(10,$page);
    
} else if (isset($_GET['search'])) {
    
    $products = $databaseService->searchProducts($_GET['search']);
    
} else {
    $products = $databaseService->getAllProducts(10,0);
}


if ($products) {
    include '../views/_browseProducts.php';
} else {
    echo 'No Products to display.';
}

?>