<?php
	include_once("Ketnoi.php");
	class modelCompany{
		function selectCompany(){ 
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$query = "select * from congty";
				$table = mysql_query($query);
				$p->dongketnoi($con);
				return $table;
			}
			else{
				return false;
			}
		}
		function selectCompanyById(){ 
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$query = "select * from congty where id_congty =".$id;
				$table = mysql_query($query);
				$p->dongketnoi($con);
				return $table;
			}
			else{
				return false;
			}
		}
	}
?>