<?php
	class Guest {
		private $id;
		private static $guest = NULL;
		private static $isLoggedIn = FALSE;

		private function __construct() {
			
		}

		static function logIn($id) {
			if (FALSE == self::$isLoggedIn) {
				if (NULL == self::$guest) {
					self::$guest = new Guest();
					self::$guest->id = $id;
				}
				self::$isLoggedIn = TRUE;
				return self::$guest;
			} else {
				return NULL;
			}
		}	

		function logOut(Guest $loggedOut) {
			self::$isLoggedIn = FALSE;
		}

		public function getId() {return $this->id;}
	}
?>