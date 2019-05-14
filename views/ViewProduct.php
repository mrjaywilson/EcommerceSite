<?php

session_start();

include ('layout/_header.php');

require_once '../business/DatabaseService.php';
require_once '../models/Product.php';

$id = $_GET['productid'];

$service = new DatabaseService('');

$product = $service->getProduct($id);

?>

<html>

<body>

	<div align="center">

		<hr />

		<h3><?php echo $product->getName(); ?></h3>

	</div>

	<div align="center">
		<table>
			<tr>
				<th width="120"></th>
				<th width="120"></th>
			</tr>
			<tr>
				<td>Id</td>
				<td> <?php echo $product->getId(); ?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td> <?php echo $product->getName(); ?></td>
			</tr>
			<tr>
				<td>Category</td>
				<td> <?php echo $product->getCategory(); ?></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><?php echo $product->getDescription(); ?></td>
			</tr>
			<tr>
				<td>SKU</td>
				<td><?php echo $product->getSku(); ?></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><?php echo $product->getCost(); ?></td>
			</tr>
		</table>

		<br />
		<form action="../controllers/CartController.php">
			<label>QTY:&nbsp;</label>
			<input type="text" name="qty" style="width: 50px">
			<button name="productid" value="<?php echo $product->getId(); ?>">Add To Cart</button>
		</form>
		<a href="../views/BrowseProducts.php">Back to Results</a>
	</div>
</body>

</html>