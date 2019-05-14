<?php

session_start();

require_once '../models/User.php';
require_once '../business/DatabaseService.php';

$db = new DatabaseService('');

$user = null;

if (isset($_GET['user'])) {
    $user = $_GET['user'];
} else {
    // fail
}

$user = $db->getUser($user);

?>

<html>
<head>

</head>

<body>

<?php include 'layout/_menu.php'; ?>

<div align="center">
    <h3>ADD NEW USER</h3>
</div>

<hr/><br/>

<div align="center">
    <form action="../controllers/AccountController.php">
        <table>
            <tr>
                <td>
                    User Name
                </td>
                <td>
                    <input name="username" type="text" value="">
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input name="password" type="password" value="">
                </td>
            </tr>
            <tr>
                <td>
                    First Name
                </td>
                <td>
                    <input name="first" type="text" value="">
                </td>
            </tr>
            <tr>
                <td>
                    Last Name
                </td>
                <td>
                    <input name="last" type="text" value="">
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input name="email" type="text" value="">
                </td>
            </tr>
            <tr>
                <td>
                    Address
                </td>
                <td>
                    <input name="address" type="text" value="">
                </td>
            </tr>
            <tr>
                <td>
                    City
                </td>
                <td>
                    <input name="city" type="text" value="">
                </td>
            </tr>
            <tr>
                <td>
                    State
                </td>
                <td>
                    <input name="state" type="text" value="">
                </td>
            </tr>
            <tr>
                <td>
                    Zip Code
                </td>
                <td>
                    <input name="zip" type="text" value="">
                </td>
            </tr>
            <tr>
                <td align="left">
                    <input id="button" name="cancel" value="cancel" type="button" onClick="window.location='UserManagement.php';" formnovalidate>
                </td>
                <td align="right">
                    <input name="create" value="create" type="submit">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                	<span align="center">ALL FIELDS REQUIRED.</span>
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>

</html>