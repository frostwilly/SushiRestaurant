<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sushi Restaurant</title>
        <link rel="stylesheet" type="text/css" href="./style/employeeStyle.css">
    </head>
    <body>
		<a href="index.php">Logout</a>
		
        <form method="post" action="cashierCheckBill.php">
            <table class="tableverticalhorizontalcenter">
                <tr><th><h1>Cashier</h1></th></tr>
                <tr><td>Bill's ID</td></tr>
                <tr><td><input class="employeeInput shadowbox" type="text" name="billID" placeholder="Bill's ID"></td></tr>
                <tr><th><br><input class="employeeInput woodbutton shadowbox" type='submit' value='Check'></th></tr>
            </table>
        </form>
    </body>
</html>
