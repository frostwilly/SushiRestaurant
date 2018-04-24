<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sushi Restaurant</title>
        <link rel="stylesheet" type="text/css" href="../style/employeeStyle.css">
    </head>
    <body>
        <?php
		require_once '../controller/rb.php';
		R::setup('mysql:host=localhost;dbname=sushi_database', 'root', '');
                include_once '../model/Employee.php';
		include_once("../controller/CookOrderDAO.php");
        session_start();
        $employee = $_SESSION['employee'];
        $username = $employee->getUsername();
		
		if(isset($_POST['btn_submit']))
		{
			CookOrderDAO::update($_POST['id'], 'served', null);
			session_unset();
			$_SESSION['employee'] = $employee;
			header('Location: chef.php');
		}
        ?>
		
        <button class="employeeInput woodbutton shadowbox logoutbutton"
                onclick="location.href = '../index.php'"
                onmouseover="this.innerHTML = 'LOGOUT'"
                onmouseout="this.innerHTML = '<?= strtoupper($username) ?>'">
                    <?= strtoupper($username) ?>
        </button>

        <form method="post" action="#">
            <div class="tabledivoverflow tableverticalhorizontalcenter tablebackgroundbordered">
                <table>
				<?php
					if(isset($_POST['btn_cook']))
					{
						CookOrderDAO::update($_POST['id'], 'cooking', $employee->getId());
						
						?>
					<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
					<tr><th colspan="2"><h1>Chef</h1></th></tr>
                    <tr>
                        <td style="width: 20vw">Table ID</td>
                        <td>: <?php echo $_POST['tableId']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20vw">Food Name</td>
                        <td>: <?php echo $_POST['name']; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20vw">Quantity</td>
                        <td>: <?php echo $_POST['quantity']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><br><input class="employeeInput woodbutton shadowbox" type='submit' name="btn_submit" value='Finish Cook'></td>
                    </tr>
						<?php
					}
				?>
                </table>
            </div>
        </form>
    </body>
</html>
