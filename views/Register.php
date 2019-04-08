<html>
<head>

</head>

<body>

<div align="center">
    <h3>REGISTER NEW ACCOUNT</h3>
</div>

<hr/><br/>

<div align="center">
    <form action="../controllers/RegisterController.php" method="post">
        <table>
            <tr>
                <td>
                    User Name
                </td>
                <td>
                    <input name="username" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input name="password" type="password">
                </td>
            </tr>
            <tr>
                <td>
                    First Name
                </td>
                <td>
                    <input name="first" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Last Name
                </td>
                <td>
                    <input name="last" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input name="email" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Address
                </td>
                <td>
                    <input name="address" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    City
                </td>
                <td>
                    <input name="city" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    State
                </td>
                <td>
                    <input name="state" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Zip Code
                </td>
                <td>
                    <input name="zip" type="text">
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="right">
                    <input name="login" value="REGISTER" type="submit">
                </td>
            </tr>
        </table>
    </form></div>
</body>

</html>