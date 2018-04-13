<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sushi Restaurant</title>
        <link rel="stylesheet" type="text/css" href="./style/employeeStyle.css">
    </head>
    <body>
        <form method="post">
            <table class="checkbilltable tableverticalhorizontalcenter">
                <tr><th colspan="4"><h1>Bill</h1></th></tr>
                <tr>
                    <th>Order</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td>Pika</td>
                    <td>Rp. 10.000</td>
                    <td class="tdquantity"><input type="number" min="1" max="99" value="1"></td>
                    <td>Rp. 10.000</td>
                </tr>
                <tr>
                    <td>chu</td>
                    <td>Rp. 30.000</td>
                    <td class="tdquantity"><input type="number" min="1" max="99" value="10"></td>
                    <td>Rp. 300.000</td>
                </tr>
                <tr><td class="borderedunderline" colspan="4"></td></tr>
                <tr>
                    <td colspan="3">Grand total</td>
                    <td>Rp. 310.000</td>
                </tr>
                <tr>
                    <th colspan="4"><br><input style='padding: 10px; border-radius: 10px' type='submit' value='Payment'></th>
                </tr>
            </table>
        </form>
    </body>
</html>
