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
                    <tr><th colspan="4"><h1>Chef</h1></th></tr>
                    <tr>
                        <th>Order ID</th>
                        <th>Food Name</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>foodA</td>
                        <td>3</td>
                        <td><button class="employeeInput woodbutton shadowbox">Finish Cooking</button></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>foodB</td>
                        <td>1</td>
                        <td><button class="employeeInput woodbutton shadowbox">Finish Cooking</button></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>foodB</td>
                        <td>1</td>
                        <td><button class="employeeInput woodbutton shadowbox">Finish Cooking</button></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>foodB</td>
                        <td>1</td>
                        <td><button class="employeeInput woodbutton shadowbox">Finish Cooking</button></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>foodB</td>
                        <td>1</td>
                        <td><button class="employeeInput woodbutton shadowbox">Finish Cooking</button></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>foodB</td>
                        <td>1</td>
                        <td><button class="employeeInput woodbutton shadowbox">Finish Cooking</button></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>foodB</td>
                        <td>1</td>
                        <td><button class="employeeInput woodbutton shadowbox">Finish Cooking</button></td>
                    </tr>
                    <tr>
                        <th colspan="4"><br><input class='employeeInput woodbutton shadowbox' type='submit' value='Payment'></th>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>
