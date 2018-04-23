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
			include_once 'model/Order.php';
			include_once 'model/MenuItem.php';
			include_once 'controller/OrderDAO.php';
			include_once("controller/MenuDAO.php");
			include_once("controller/PaymentDAO.php");
			session_start();
			$employee = $_SESSION['employee'];
			$username = $employee->getUsername();
			
			if(isset($_POST['btn_pay']))
			{
				PaymentDAO::insert('cash', $employee->getId(), $_POST['guestId']);
				session_unset();
				$_SESSION['employee'] = $employee;
				header('Location: cashier.php');
			}
        ?>
        <button class="employeeInput woodbutton shadowbox logoutbutton"
                onclick="location.href = 'index.php'"
                onmouseover="this.innerHTML = 'LOGOUT'"
                onmouseout="this.innerHTML = '<?= strtoupper($username) ?>'">
                    <?= strtoupper($username) ?>
        </button>

        <form method="post" action="#">
            <div class="tabledivoverflow tableverticalhorizontalcenter tablebackgroundbordered">
                <table>
                    <tr><th colspan="4"><h1>Bill</h1></th></tr>
                    <tr>
                        <th>Order</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
					<?php
						if(isset($_POST['btn_submit']))
						{
							$o = new OrderDAO();
							$m = new MenuDAO();
							$id = $_POST['id'];
							$list = $o->getAll($id);
							if($list == null)
							{
								$_SESSION['message'] = 'there is no order for table '.$id;
								header('Location: cashier.php');
							}
							
							$grandTotal = 0;
							foreach($list as $key => $value)
							{
								$data = $m->getOne($value->getMenuId());
								$total = $data->getPrice()*$value->getQuantity();
								$grandTotal += $total;
								?>
                    <tr>
                        <td><?php echo $data->getName(); ?></td>
                        <td>Rp. <?php echo $data->getPrice(); ?></td>
                        <td class="tdquantity"><input class="employeeInput shadowbox" type="number" min="1" max="99" value="<?php echo $value->getQuantity(); ?>"></td>
                        <td>Rp. <?php echo $total; ?></td>
                    </tr>
								<?php
							}
						}
					?>
                    <tr><td class="borderedunderline" colspan="4"></td></tr>
                    <tr>
                        <td colspan="3">Grand total</td>
                        <td>Rp. <?php 
                            if(isset($grandTotal)){
                                echo $grandTotal;
                            }
                        ?></td>
                    </tr>
					<input type="hidden" name="guestId" value="<?php echo $id; ?>">
                    <tr>
                        <th colspan="4"><br><input class='employeeInput woodbutton shadowbox' type='submit' name="btn_pay" value='Payment'></th>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>
