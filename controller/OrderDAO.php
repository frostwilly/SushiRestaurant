<?php
	require_once 'rb.php';
	include_once('../model/Order.php');
	
	class OrderDAO
	{		
		function insert($guestId, $menuId, $qty)
		{
			$order = R::dispense('orders');
			$order->guest_id = $guestId;
			$order->menu_id = $menuId;
			$order->quantity = $qty;
			return R::store($order);
		}
		
		function getAll($id)
		{
			$result = R::find('orders', ' guest_id = :guestId ',array(':guestId' => $id));
			$list = array();
			foreach($result as $key => $value)
			{
				$item = new Order($key, $value->guest_id, $value->menu_id, $value->quantity);
				$list[] = $item;
			}
			return $list;
		}
		
		function getOne($id)
		{
			return R::load('orders', $id);
		}
	}
?>