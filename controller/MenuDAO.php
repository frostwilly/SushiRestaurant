<?php
	require_once 'rb.php';
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
		
		function getOne($id)
		{
			$result = R::findOne('menus', ' id = ? ',array($id));
			$item = new MenuItem($result->id, $result->name, $result->price, $result->category);
			return $item;
		}
	}
?>