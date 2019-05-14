
<?php

session_start();

$report = "";

if (isset($_SESSION['ReportInfo'])) {
    if ($_SESSION['ReportInfo']) {
        $report = $_SESSION['ReportInfo'];
    } else {
        $report = null;
    }
} else {
    $report = null;
}

?>

<html>

<head>
	<?php include('layout/_header.php'); ?>
</head>

<div align="center">
	<hr>
	<h3>ORDER REPORT</h3>
</div>

<hr>

<br />

<body>
	<div align="center">
		<h4>Begin Date: <?php echo $_SESSION['StartDate']; ?> &nbsp;&nbsp;&nbsp;&nbsp;  End Date: <?php echo $_SESSION['EndDate']; ?></h4>
		<br />
		<br />
		<table id="myTable" class="display">
			<thead>
				<tr>
					<th width='100px'>Order ID</th>
					<th width='100px'>User ID</th>
					<th width='150px'>Product ID</th>
					<th width='200px'>Date Ordered</th>
					<th width='100px'>Quantity</th>
				</tr>
			</thead>
			<tbody>
    			<?php

    if (! $report) {
        echo "<tr>";
        echo "<td colspan='5' align='center'>";
        echo "No results found!";
        echo "</td>";
        echo "</tr>";
    } else {
        foreach ($report as $item) {
            echo "<tr>";
            echo "<td>" . $item['order_number'] . "</td>";
            echo "<td>" . $item['user_id'] . "</td>";
            echo "<td>" . $item['product_id'] . "</td>";
            echo "<td>" . $item['order_date'] . "</td>";
            echo "<td>" . $item['qty'] . "</td>";
            echo "</tr>";
        }
    }
    ?>
			</tbody>
		</table>

		<form action="../controllers/RESTController.php">
    		<br/>
				<button class="btn btn-primary">GENERATE JSON REPORT</button>
    		<br/>
		</form>
	</div>
</body>

</html>