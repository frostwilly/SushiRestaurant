<?php
	require_once 'rb.php';
	
	class OrderDAO
	{		
		function insert($number)
		{
			$order = R::dispense('orders');
			$order->table_number = $number;
			return R::store($order);
		}
	}
?>