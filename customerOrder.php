<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sushi Restaurant</title>

        <link rel="stylesheet" type="text/css" href="./style/customerStyle.css">
        <link rel="stylesheet" type="text/css" href="./style/modalbox.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
		<script src="javascript/jquery-3.3.1.min.js"></script>
		<script src="javascript/cart.js"></script>
		
        <div class="header shadowbox">
            <i onclick="callWaiter()" class="material-icons md-light md-48">notifications</i>
            <i id="cartBtn" class="material-icons md-light md-48">shopping_cart</i>
            <i id="billBtn" class="material-icons md-light md-48">format_list_numbered</i>
        </div>
        <div style="margin-bottom: 50px"></div>
		
		<?php
			include_once("model/Guest.php");
			session_start();
			require_once 'controller/rb.php';
			R::setup('mysql:host=localhost;dbname=sushi_database', 'root', '');
			include_once("controller/MenuDAO.php");
			include_once("controller/OrderDAO.php");
			include_once("controller/MenuOrderDAO.php");
			include_once('model/PromoMenuListIterator.php');
			include_once('model/RegulerMenuListIterator.php');
			
			if(isset($_SESSION['guest']))
			{
				$guest = $_SESSION['guest'];
				$id = $guest->getId();
				echo "Welcome! This is table $id";
			}
			
			$m = new MenuDAO();
			$data = $m->getAll();
			$promoIterator = new PromoMenuListIterator($data);
			$regulerIterator = new RegulerMenuListIterator($data);
		?>
		
        <?php include_once './promoMenu.php'; ?>
        <?php include_once './regulerMenu.php'; ?>
        
        <!-- The Snackbar for item added to cart -->
        <div id="snackbar"></div>

        <!-- The Modal for Cart -->
        <div id="modalCart" class="modal">

            <!-- Modal content for Cart -->
            <div class="modal-content shadowbox">
                <span class="close">&times;</span>
                <h1>Cart</h1>
				<form method="post" action="#">
					<table class="modaltable" id="cart">
						<tr>
							<th>Order</th>
							<th>Qty</th>
						</tr>
						<!--
						<tr>
							<td>Pika</td>
							<td class="tdquantity"><input style="padding: 5px; border-radius: 10px" type="number" min="1" max="99"></td>
						</tr>
						-->
					</table>
					<br>
					<input style="padding: 10px; border: 0; border-radius: 10px" type="submit" name="btn_submit">
				</form>
            </div>
        </div>

        <!-- The Modal for Cart -->
        <div id="modalBill" class="modal">

            <!-- Modal content for Cart -->
            <div class="modal-content shadowbox">
                <span class="close">&times;</span>
                <h1>Bill</h1>
                <table class="modaltable">
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
							$mo = new MenuOrderDAO();
							$grandTotal = 0;
							$id = $o->insert(1);
							foreach($_POST['id'] as $key => $value)
							{
								$data = $m->getOne($value);
								$qty = $_POST['qty'][$key] != "" ? $_POST['qty'][$key] : 0;
								$total = $data->getPrice()*$qty;
								$grandTotal += $total;
								$mo->insert($id, $value, $qty, 2);
								?>
								
					<tr>
                        <td><?php echo $data->getName(); ?></td>
                        <td>Rp. <?php echo $data->getPrice(); ?></td>
                        <td class="tdquantity"><?php echo $qty; ?></td>
                        <td>Rp. <?php echo $total; ?></td>
                    </tr>
								
								<?php
							}
							session_unset();
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
                </table>
            </div>
        </div>
        <script src="./javascript/modalbox.js"></script>
    </body>
</html>
