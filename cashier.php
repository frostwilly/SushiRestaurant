<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sushi Restaurant</title>
        <link rel="stylesheet" type="text/css" href="./style/employeeStyle.css">
        <script src="./javascript/employeesnackbar.js"></script>
    </head>
    <body>
        <!-- The Snackbar for item added to cart -->
        <div id="snackbar"></div>

        <?php
        include_once 'model/Employee.php';
        session_start();
        $employee = $_SESSION['employee'];
        $username = $employee->getUsername();

        if (isset($_SESSION['message'])) {
            echo "<script type='text/javascript'>snackbarAnimate('" . ucfirst($_SESSION['message']) . "')</script>";
            unset($_SESSION['message']);
        }
        ?>
        <button class="employeeInput woodbutton shadowbox logoutbutton"
                onclick="location.href = 'index.php'"
                onmouseover="this.innerHTML = 'LOGOUT'"
                onmouseout="this.innerHTML = '<?= strtoupper($username) ?>'">
                    <?= strtoupper($username) ?>
        </button>

        <form method="post" action="cashierCheckBill.php">
            <table style="padding:20px;" class="tableverticalhorizontalcenter tablebackgroundbordered">
                <tr><th><h1>Cashier</h1></th></tr>
                <tr><td>Table Number</td></tr>
                <tr><td><input class="employeeInput shadowbox" type="text" name="id" placeholder="Table Number"></td></tr>
                <tr><th><br><input class="employeeInput woodbutton shadowbox" type='submit' name="btn_submit" value='Check'></th></tr>
            </table>
        </form>
    </body>
</html>
