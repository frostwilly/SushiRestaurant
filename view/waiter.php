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
        session_start();
        $employee = $_SESSION['employee'];
        $username = $employee->getUsername();
		
		if(isset($_POST['btn_submit']))
		{
			R::exec('delete from notification where id = '.$_POST['id']);
			header('Location: waiter.php');
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
                    <tr><th colspan="2"><h1>Waiter</h1></th></tr>
                    <tr>
                        <th>Table ID</th>
                        <th></th>
                    </tr>
					<?php
						$list = R::findAll('notification');
						foreach($list as $key => $value)
						{
							?>
					<input type="hidden" name="id" value="<?php echo $key; ?>">
					<tr>
                        <td>Table <?php echo $key; ?> Called</td>
                        <td><button type="submit" name='btn_submit' class="employeeInput woodbutton shadowbox">OK</button></td>
                    </tr>
							<?php
						}
						$_SESSION['employee'] = $employee;
						header('refresh: 1; url= waiter.php');
					?>
                </table>
            </div>
        </form>
    </body>
</html>
