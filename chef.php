<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sushi Restaurant</title>
        <link rel="stylesheet" type="text/css" href="./style/employeeStyle.css">
    </head>
    <body>
        <?php
		require_once 'controller/rb.php';
		R::setup('mysql:host=localhost;dbname=sushi_database', 'root', '');
        include_once 'model/Employee.php';
		include_once("controller/MenuDAO.php");
		include_once("controller/OrderDAO.php");
		include_once("controller/CookOrderDAO.php");
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
					<?php
						$list = CookOrderDAO::getAll();
						foreach($list as $key => $value)
						{
							if($value->getCookingStatus() == 'waiting')
							{
								$order = OrderDAO::getOne($value->getOrderId());
								$menu = MenuDAO::getOne($order->menu_id);
							?>
					<input type="hidden" name="id" value="<?php echo $value->getId(); ?>">
					<input type="hidden" name="tableId" value="<?php echo $order->guest_id; ?>">
					<input type="hidden" name="name" value="<?php echo $menu->getName(); ?>">
					<input type="hidden" name="quantity" value="<?php echo $order->quantity; ?>">
					<tr>
                        <td><?php echo $order->guest_id; ?></td>
                        <td><?php echo $menu->getName(); ?></td>
                        <td><?php echo $order->quantity; ?></td>
                        <td><button type="submit" name="btn_cook" class="employeeInput woodbutton shadowbox">Cook This</button></td>
                    </tr>
							<?php
							}
						}
					?>
                </table>
            </div>
        </form>
    </body>
</html>
