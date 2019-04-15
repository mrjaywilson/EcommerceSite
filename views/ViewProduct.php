<?php 

require_once '../business/DatabaseService.php';

$id = $_GET['productid'];

$service = new DatabaseService('');

$product = $service->getProduct($id);

echo "<h2>Product Details</h2>";

echo "<table>";

echo "<tr>";
echo "<td>Id</td>";
echo "<td>" . $product[0]['id'] . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Name</td>";
echo "<td>" . $product[0]['name'] . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Category</td>";
echo "<td>" . $product[0]['category'] . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Description</td>";
echo "<td>" . $product[0]['description'] . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>SKU</td>";
echo "<td>" . $product[0]['sku'] . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Price</td>";
echo "<td>" . $product[0]['cost'] . "</td>";
echo "</tr>";
echo "</table>";

echo "<br/>";

?>

<a href="../controllers/BrowseController.php?page=5">Back to Results</a>