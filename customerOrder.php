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

        <div class="header">
            <i onclick="alert('Waiter called');" class="material-icons md-48">notifications</i>
            <i id="cartBtn" class="material-icons md-48">shopping_cart</i>
            <i id="billBtn" class="material-icons md-48">format_list_numbered</i>
        </div>
        <div style="margin-bottom: 50px"></div>
        <?php include_once './promoMenu.php'; ?>
        <?php include_once './regulerMenu.php'; ?>

        <!-- The Modal for Cart -->
        <div id="modalCart" class="modal">

            <!-- Modal content for Cart -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>Cart</h1>
                <table class="modaltable">
                    <tr>
                        <th>Order</th>
                        <th>Qty</th>
                    </tr>
                    <tr>
                        <td>Pika</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td class="tdquantity"><input type="number" min="1" max="99"></td>
                    </tr>
                </table>
                <br>
                <input type="submit">
            </div>
        </div>
        
        <!-- The Modal for Cart -->
        <div id="modalBill" class="modal">

            <!-- Modal content for Cart -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>Bill</h1>
                <table class="modaltable">
                    <tr>
                        <th>Order</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td>Pika</td>
                        <td>Rp. 10.000</td>
                        <td class="tdquantity">1</td>
                        <td>Rp. 10.000</td>
                    </tr>
                    <tr>
                        <td>chu</td>
                        <td>Rp. 30.000</td>
                        <td class="tdquantity">10</td>
                        <td>Rp. 300.000</td>
                    </tr>
                    <tr><td class="borderedunderline" colspan="4"></td></tr>
                    <tr>
                        <td colspan="3">Grand total</td>
                        <td>Rp. 310.000</td>
                    </tr>
                </table>
            </div>
        </div>
        <script src="./javascript/modalbox.js"></script>
    </body>
</html>
