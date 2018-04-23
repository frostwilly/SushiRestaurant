<?php
	class CookOrder
	{
		private $id;
		private $orderId;
		private $cookingStatus;
		private $employeeId;
		
		function __construct($id, $orderId, $cookingStatus, $employeeId)
		{
			$this->id = $id;
			$this->orderId = $orderId;
			$this->cookingStatus = $cookingStatus;
			$this->employeeId = $employeeId;
		}
		function getId(){return $this->id;}
		function getOrderId(){return $this->orderId;}
		function getCookingStatus(){return $this->cookingStatus;}
		function getEmployeeId(){return $this->employeeId;}
	}
?>