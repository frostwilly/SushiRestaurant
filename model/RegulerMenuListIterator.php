<?php
	//include('MenuList.php');
	
	class RegulerMenuListIterator {
		protected $menuList;
		protected $currentMenu = 0;

		public function __construct(MenuList $menuList) {
			$this->menuList = $menuList;
		}
		public function getCurrentMenu() {
			if (($this->currentMenu > 0) && 
				($this->menuList->getMenuItemCount() >= $this->currentMenu)) {
				return $this->menuList->getMenuItem($this->currentMenu);
			}
		}
		public function getNextMenu() {
			if ($this->hasNextMenu()) {
				$tmp = $this->menuList->getMenuItem(++$this->currentMenu);
				if($tmp->getCategory() == "reguler")
				{
					return $tmp;
				}
				else
				{
					return $this->getNextMenu();
				}
			} else {
				return NULL;
			}
		}
		public function hasNextMenu() {
			if ($this->menuList->getMenuItemCount() > $this->currentMenu) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
?>