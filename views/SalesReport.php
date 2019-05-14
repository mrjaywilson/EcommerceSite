<html>
<head>



</head>

<?php include('layout/_header.php'); ?>

<div align="center">
    <h3>
        GENERATE SALES REPORT
    </h3>
</div>

<hr>

<br/>

<body>
<div align="center">
    <form action="../controllers/SalesReportController.php">
        <table>
            <tr>
                <td>
                    Start Date
                </td>
                <td>
                    <input name="startdate" type="date">
                </td>
            </tr>
            <tr>
                <td>
                    End Date
                </td>
                <td>
                    <input name="enddate" type="date">
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
	                <button class="btn btn-primary" name="report" type="submit">Generate report</button>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>

</html>