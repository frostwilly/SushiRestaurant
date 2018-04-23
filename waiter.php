<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sushi Restaurant</title>
        <link rel="stylesheet" type="text/css" href="./style/employeeStyle.css">
    </head>
    <body>
        <?php
        include_once 'model/Employee.php';
        session_start();
        $employee = $_SESSION['employee'];
        $username = $employee->getUsername();
        ?>
        <button class="employeeInput woodbutton shadowbox logoutbutton"
                onclick="location.href = 'index.php'"
                onmouseover="this.innerHTML = 'LOGOUT'"
                onmouseout="this.innerHTML = '<?= strtoupper($username) ?>'">
                    <?= strtoupper($username) ?>
        </button>

        <form method="post">
            <div class="tabledivoverflow tableverticalhorizontalcenter tablebackgroundbordered">
                <table>
                    <tr><th colspan="2"><h1>Waiter</h1></th></tr>
                    <tr>
                        <th>Table ID</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Table 1 Called</td>
                        <td><button type="submit" class="employeeInput woodbutton shadowbox">OK</button></td>
                    </tr>
                    <tr>
                        <td>Table 2 Called</td>
                        <td><button type="submit" class="employeeInput woodbutton shadowbox">OK</button></td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>
