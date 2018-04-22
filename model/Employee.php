<?php
	class Employee
	{
		private $id;
		private $username;
		private $password;
		private $jobTitle;
		
		function __construct($id, $username, $password, $jobTitle)
		{
			$this->id = $id;
			$this->username = $username;
			$this->password = $password;
			$this->jobTitle = $jobTitle;
		}
		function getId(){return $this->id;}
		function getUsername(){return $this->username;}
		function getPassword(){return $this->password;}
		function getJobTitle(){return $this->jobTitle;}
	}
?>