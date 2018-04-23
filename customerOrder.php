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
		
		<?php
			require_once 'controller/rb.php';
			R::setup('mysql:host=localhost;dbname=sushi_database', 'root', '');
			include_once("controller/MenuDAO.php");
			include_once("controller/OrderDAO.php");
			include_once("controller/CookOrderDAO.php");
			include_once("model/Guest.php");
			include_once('model/PromoMenuListIterator.php');
			include_once('model/RegulerMenuListIterator.php');
			session_start();
			
			if(isset($_SESSION['guest']))
			{
				$guest = $_SESSION['guest'];
				$id = $guest->getId();
			}
			
			if(isset($_POST['action']))
			{
				R::exec('insert into notification values('.$id.')');
			}
			
			$m = new MenuDAO();
			$data = $m->getAll();
			$promoIterator = new PromoMenuListIterator($data);
			$regulerIterator = new RegulerMenuListIterator($data);
		?>
		
        <div class="header shadowbox">
            <i onclick="callWaiter()" class="material-icons md-light md-48">notifications</i>
            <i id="cartBtn" class="material-icons md-light md-48">shopping_cart</i>
            <i id="billBtn" class="material-icons md-light md-48">format_list_numbered</i>
        </div>
        <button class="employeeInput woodbutton shadowbox logoutbutton"
                onclick="location.href = 'index.php'">
                <?= strtoupper("table ". $id) ?>
        </button>
        <div style="margin-bottom: 50px"></div>
                
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
                            </table>
                            <br>
                            <input style="padding: 10px; border: 0; border-radius: 10px;" onmouseover="this.style.cursor='pointer'" type="submit" name="btn_submit">
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
							$c = new CookOrderDAO();
							$grandTotal = 0;
							foreach($_POST['id'] as $key => $value)
							{
								$data = $m->getOne($value);
								$qty = $_POST['qty'][$key] != "" ? $_POST['qty'][$key] : 0;
								$total = $data->getPrice()*$qty;
								$grandTotal += $total;
								if($qty != 0)
								{
									$orderId = $o->insert($id, $value, $qty);
									$c->insert($orderId, 'waiting', null);
								?>
								
					<tr>
                        <td><?php echo $data->getName(); ?></td>
                        <td>Rp. <?php echo $data->getPrice(); ?></td>
                        <td class="tdquantity"><?php echo $qty; ?></td>
                        <td>Rp. <?php echo $total; ?></td>
                    </tr>
								
								<?php
								}
							}
							session_unset();
							$_SESSION['guest'] = $guest;
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
