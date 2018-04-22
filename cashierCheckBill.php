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
                    <tr><th colspan="4"><h1>Bill</h1></th></tr>
                    <tr>
                        <th>Order</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td>Pika</td>
                        <td>Rp. 10.000</td>
                        <td class="tdquantity"><input class="employeeInput shadowbox" type="number" min="1" max="99" value="1"></td>
                        <td>Rp. 10.000</td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td>Rp. 30.000</td>
                        <td class="tdquantity"><input class="employeeInput shadowbox" type="number" min="1" max="99" value="10"></td>
                        <td>Rp. 300.000</td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td>Rp. 30.000</td>
                        <td class="tdquantity"><input class="employeeInput shadowbox" type="number" min="1" max="99" value="10"></td>
                        <td>Rp. 300.000</td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td>Rp. 30.000</td>
                        <td class="tdquantity"><input class="employeeInput shadowbox" type="number" min="1" max="99" value="10"></td>
                        <td>Rp. 300.000</td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td>Rp. 30.000</td>
                        <td class="tdquantity"><input class="employeeInput shadowbox" type="number" min="1" max="99" value="10"></td>
                        <td>Rp. 300.000</td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td>Rp. 30.000</td>
                        <td class="tdquantity"><input class="employeeInput shadowbox" type="number" min="1" max="99" value="10"></td>
                        <td>Rp. 300.000</td>
                    </tr>
                    <tr><td class="borderedunderline" colspan="4"></td></tr>
                    <tr>
                        <td colspan="3">Grand total</td>
                        <td>Rp. 310.000</td>
                    </tr>
                    <tr>
                        <th colspan="4"><br><input class='employeeInput woodbutton shadowbox' type='submit' value='Payment'></th>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>
