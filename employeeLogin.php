<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Employee Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./style/employeeStyle.css">
    </head>
    <body>
		<?php
			session_start();
			require_once 'controller/rb.php';
			R::setup('mysql:host=localhost;dbname=sushi_database', 'root', '');
			include_once("controller/EmployeeDAO.php");
			
			if(isset($_POST['btn_login']))
			{
				$employee = EmployeeDAO::getOne($_POST['username'], $_POST{'password'});
				if($employee != null)
				{
					$_SESSION['employee'] = $employee;
					if($employee->getJobTitle() == 'cashier')
						header('Location: cashier.php');
					else if($employee->getJobTitle() == 'waiter')
						header('Location: cashier.php');
					else
						header('Location: chef.php');
				}
				else
					echo "<script type='text/javascript'>alert('Wrong username or password!');</script>";
			}
		?>
	
        <form method="post" action="#">
            <table class="tableverticalhorizontalcenter">
                <tr><th><h1>Login</h1></th></tr>
                <tr><td>Username</td></tr>
                <tr><td><input class='employeeInput shadowbox' type="text" name="username" placeholder="Employee's username"></td><tr>
                <tr><td>Password</td></tr>
                <tr><td><input class='employeeInput shadowbox' type="password" name="password" placeholder="Employee's password"></td></tr>
                <tr><th><br><input class='employeeInput woodbutton shadowbox' type='submit' value='Login' name="btn_login"></th></tr>
            </table>
        </form>
    </body>
</html>
