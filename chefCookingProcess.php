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
                    <tr><th colspan="2"><h1>Chef</h1></th></tr>
                    <tr>
                        <td style="width: 20vw">Table ID</td>
                        <td>: 1</td>
                    </tr>
                    <tr>
                        <td style="width: 20vw">Food Name</td>
                        <td>: drinkA</td>
                    </tr>
                    <tr>
                        <td style="width: 20vw">Quantity</td>
                        <td>: 10</td>
                    </tr>
                    <tr>
                        <td colspan="2"><br><input class="employeeInput woodbutton shadowbox" type='submit' value='Finish Cook'></td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>
