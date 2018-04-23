<?php
	class Order
	{
		private $id;
		private $guestId;
		private $menuId;
		private $quantity;
		
		function __construct($id, $guestId, $menuId, $quantity)
		{
			$this->id = $id;
			$this->guestId = $guestId;
			$this->menuId = $menuId;
			$this->quantity = $quantity;
		}
		function getId(){return $this->id;}
		function getGuestId(){return $this->guestId;}
		function getMenuId(){return $this->menuId;}
		function getQuantity(){return $this->quantity;}
	}
?>