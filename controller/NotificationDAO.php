<?php
	require_once 'rb.php';
	include_once('../model/CookOrder.php');
	
	class NotificationDAO
	{		
		function insert($id)
		{
			return R::exec('insert into notification values('.$id.')');
		}
                
                function delete($id){
                    return R::exec("delete from notification where id = '$id'");
                }
                        
		function getAll()
		{
			$result = R::findAll('notification');
			return $result;
		}
	}
?>