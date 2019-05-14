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
    <h3>UPDATE ACCOUNT INFO</h3>
</div>

<hr/><br/>

<div align="center">
    <form action="../controllers/AccountController.php">
        <table>
            <tr>
                <td>
                    User Name**
                </td>
                <td>
                    <input name="username" type="text" value="<?php echo $user->getUsername();?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    Password**
                </td>
                <td>
                    <input name="password" type="password" value="<?php echo $user->getPassword();?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    First Name
                </td>
                <td>
                    <input name="first" type="text" value="<?php echo $user->getFirstName();?>">
                </td>
            </tr>
            <tr>
                <td>
                    Last Name
                </td>
                <td>
                    <input name="last" type="text" value="<?php echo $user->getLastName(); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input name="email" type="text" value="<?php echo $user->getEmail(); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Address
                </td>
                <td>
                    <input name="address" type="text" value="<?php echo $user->getAddress(); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    City
                </td>
                <td>
                    <input name="city" type="text" value="<?php echo $user->getCity(); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    State
                </td>
                <td>
                    <input name="state" type="text" value="<?php echo $user->getState();?>">
                </td>
            </tr>
            <tr>
                <td>
                    Zip Code
                </td>
                <td>
                    <input name="zip" type="text" value="<?php echo $user->getZipCode(); ?>">
                </td>
            </tr>
            <tr>
                <td align="left">
	                <button id="button" name="cancel" value="cancel">cancel</button>
                </td>
                <td align="right">
	                <button id="button" name="update" value="update">update</button>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                	<span>** May not be updated.<br/>Password change must be requested.</span>
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>

</html>