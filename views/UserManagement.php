<html>
<head>

</head>

<body>

<?php include 'layout/_menu.php'; ?>

<div align="center">
    <h3>USER MANAGEMENT</h3>
</div>

<hr/><br/>

<form action="../controllers/UserAdminController.php">

<div align="center">
		<button id="smallbtn" name="create">Create New User</button><br/>
        <div id="content-container">
            <table id="content_table">
                <tr>
                    <th width="15%">Username</th>
                    <th width="20%">Permission Level</th>
                    <th width="20%">Action</th>
                    <th width="20%">&nbsp;</th>
                </tr>
        
                <?php
                
                require_once '../business/DatabaseService.php';
                
                $i = 0;
                
                $db = new DatabaseService('');
                
                $users = $db->getAllUsers();
                
                for ($i = 0; $i < count($users); $i++) {
                    echo "<tr>";
                    echo "<td>" . $users[$i]['user_name'] . "</td>";
                    echo "<td>" . "N/A" . "</td>";
                    echo "<td align=\"center\"><button id=\"smallbtn\" name='edit' value='" . $users[$i]['user_name'] . "'>Edit</button></td>";
                    echo "<td align=\"center\"><button id=\"smallbtn\" name='delete' value='" . $users[$i]['user_name'] . "'>Delete</button></td>";
                    echo "</tr>";
                }
                
                ?>
            </table>
        </div>
	</div>
</form>
