<?php
	require_once 'rb.php';
	include_once('model/Employee.php');
	
	class EmployeeDAO
	{		
		function getOne($username, $password)
		{
			$result =  R::getRow('select * from employees where username = ? and password = ? limit 1', array($username, $password));
			if($result != null)
				$employee = new Employee($result['id'], $result['username'], $result['password'], $result['job_title']);
			else
				$employee = null;
			return $employee;
		}
	}
?>