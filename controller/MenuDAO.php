<?php
	require 'rb.php';
	R::setup('mysql:host=localhost;dbname=sushi_database', 'root', '');
	include_once('model/MenuItem.php');
	include_once('model/MenuList.php');
	
	class MenuDAO
	{
		function getAll()
		{
			$result = R::findAll('menus');
			$list = new MenuList();
			foreach($result as $key => $value)
			{
				$item = new MenuItem($key, $value->name, $value->price, $value->category);
				$list->addMenuItem($item);
			}
			return $list;
		}
	}
?>