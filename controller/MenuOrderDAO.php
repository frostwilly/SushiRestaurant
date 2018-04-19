<?php
	require_once 'rb.php';
	
	class MenuOrderDAO
	{	
		function insert($orderId, $menuId, $qty, $employeeId)
		{
			$menuOrder = R::dispense('menuorder');
			$menuOrder->order_id = $orderId;
			$menuOrder->menu_id = $menuId;
			$menuOrder->quantity = $qty;
			$menuOrder->employee_id = $employeeId;
			return R::store($menuOrder);
		}
	}
?>