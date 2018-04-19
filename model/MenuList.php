<?php
	//include('MenuItem.php');

	class MenuList
	{
		private $menuItems = array();
		private $menuItemCount = 0;
		
		public function __construct(){}
		public function getMenuItemCount()
		{
			return $this->menuItemCount;
		}
		private function setMenuItemCount($newCount)
		{
			return $this->menuItemCount = $newCount;
		}
		public function getMenuItem($index) {
		  if ( (is_numeric($index)) && 
			   ($index <= $this->getMenuItemCount())) {
			   return $this->menuItems[$index];
			 } else {
			   return NULL;
			 }
		}
		public function addMenuItem(MenuItem $item) {
		  $this->setMenuItemCount($this->getMenuItemCount() + 1);
		  $this->menuItems[$this->getMenuItemCount()] = $item;
		  return $this->getMenuItemCount();
		}
		public function removeMenuItem(MenuItem $item) {
		  $counter = 0;
		  while (++$counter <= $this->getMenuItemCount()) {
			if ($item->getNameAndPrice() == 
			  $this->menuItems[$counter]->getNameAndPrice())
			  {
				for ($x = $counter; $x < $this->getMenuItemCount(); $x++) {
				  $this->menuItems[$x] = $this->menuItems[$x + 1];
			  }
			  $this->setMenuItemCount($this->getMenuItemCount() - 1);
			}
		  }
		  return $this->getMenuItemCount();
		}
	}
?>