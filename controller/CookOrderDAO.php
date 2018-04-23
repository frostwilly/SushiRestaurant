<?php
	require_once 'rb.php';
	include_once('model/CookOrder.php');
	
	class CookOrderDAO
	{		
		function insert($orderId, $cookingStatus, $employeeId)
		{
			$cookorder = R::dispense('cookorder');
			$cookorder->order_id = $orderId;
			$cookorder->cooking_status = $cookingStatus;
			$cookorder->employee_id = $employeeId;
			return R::store($cookorder);
		}
		
		function getAll($id)
		{
			$result = R::findAll('cookorder');
			$list = array();
			foreach($result as $key => $value)
			{
				$item = new CookOrder($key, $value->order_id, $value->cooking_status, $value->employee_id);
				$list[] = $item;
			}
			return $list;
		}
	}
?>