<?php
	class MenuItem
	{
		private $id;
		private $name;
		private $price;
		private $category;
		
		function __construct($id, $name, $price, $category)
		{
			$this->id = $id;
			$this->name = $name;
			$this->price = $price;
			$this->category = $category;
		}
		function getId(){return $this->id;}
		function getName(){return $this->name;}
		function getPrice(){return $this->price;}
		function getCategory(){return $this->category;}
	}
?>