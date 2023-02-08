<?php
	include_once("Model/mCompany.php");
	class controllerCompany{
		function getCompany(){ 
			$p = new modelCompany();
			$table= $p->selectCompany();
			return $table;
			
		}
		function getCompanyById($id){ 
			$p = new modelCompany();
			$table= $p->selectCompanyById($id);
			return $table;
			
		}
		
	}
?>