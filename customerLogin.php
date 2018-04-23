<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Customer Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./style/employeeStyle.css">
    </head>
    <body>
		<?php
			include_once("model/Guest.php");
			session_start();
			
			if(isset($_POST['btn_login']))
			{
				$id = $_POST['id'];
				$guest = Guest::logIn($id);
				if ($guest == NULL) {
					echo "<script type='text/javascript'>alert('Table $id is not available right now!');</script>";
				} else {
					$_SESSION['guest'] = $guest;
					header('Location: customerOrder.php');
				}
			}
		?>
		
        <form method="post" action="#">
            <table class="tableverticalhorizontalcenter">
                <tr><th><h1>Login</h1></th></tr>
                <tr><td>Table Number</td></tr>
                <tr><td><input class='employeeInput shadowbox' type="text" name="id" placeholder="Table Number"></td><tr>
                <tr><th><br><input class='employeeInput woodbutton shadowbox' type='submit' value='Login' name="btn_login"></th></tr>
            </table>
        </form>
    </body>
</html>
