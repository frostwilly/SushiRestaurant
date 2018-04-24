<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sushi Restaurant App</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style/employeeStyle.css">
    </head>
    <body>
		<?php
			session_start();
			session_destroy();
		?>
        <table class='tableverticalhorizontalcenter'>
            <tr><th><h1>Sushi Restaurant</h1></th></tr>
            <tr><th><br><button class="employeeInput woodbutton shadowbox" onclick="location.href = 'view/customerLogin.php'">Customer</button></th></tr>
            <tr><th><br><button class="employeeInput woodbutton shadowbox" onclick="location.href = 'view/employeeLogin.php'">Employee</button></th></tr>
        </table>
    </body>
</html>
