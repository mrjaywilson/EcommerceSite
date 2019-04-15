<form action="../controllers/BrowseController.php">
<?php
echo "<table width='100%'>";
echo "<tr>";
echo "<td>ID</td>";
echo "<td>Name</td>";
echo "<td>Category</td>";
echo "<td>Description</td>";
echo "<td>SKU</td>";
echo "<td>Price</td>";
echo "</tr>";
for ($i = 0; $i < count($products); $i++) {
    echo "<tr>";
    echo "<td>" . $products[$i]['id'] . "</td>";
    echo "<td><a href=\"../Views/ViewProduct.php?productid=" . $products[$i]['id'] . "\">" . $products[$i]['name'] . "</a></td>";
    echo "<td>" . $products[$i]['category'] . "</td>";
    echo "<td>" . $products[$i]['description'] . "</td>";
    echo "<td>" . $products[$i]['sku'] . "</td>";
    echo "<td>" . $products[$i]['cost'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

<input type="hidden" value="5" name="page">
<input type="submit" value="next">
</form>