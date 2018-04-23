<?php
	require_once 'rb.php';
	
	class PaymentDAO
	{		
		function insert($paymentMethod, $employeeId, $guestId)
		{
			$payment = R::dispense('payments');
			$payment->payment_method = $paymentMethod;
			$payment->employee_id = $employeeId;
			$payment->guest_id = $guestId;
			return R::store($payment);
		}
	}
?>