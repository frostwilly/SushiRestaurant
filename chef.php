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

        <form method="post" action="chefCookingProcess.php">
            <div class="tabledivoverflow tableverticalhorizontalcenter tablebackgroundbordered">
                <table>
                    <tr><th colspan="4"><h1>Chef</h1></th></tr>
                    <tr>
                        <th>Table ID</th>
                        <th>Food Name</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>foodA</td>
                        <td>3</td>
                        <td><button type="submit" class="employeeInput woodbutton shadowbox">Cook This</button></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>foodB</td>
                        <td>1</td>
                        <td><button type="submit" class="employeeInput woodbutton shadowbox">Cook This</button></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>drinkB</td>
                        <td>1</td>
                        <td><button type="submit" class="employeeInput woodbutton shadowbox">Cook This</button></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>foodC</td>
                        <td>1</td>
                        <td><button type="submit" class="employeeInput woodbutton shadowbox">Cook This</button></td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>
