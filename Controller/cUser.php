<?php 
	include_once("Model/mUser.php");
	class controlUser{ 
		function dangkytk($tk,$mk){ 
			$p = new modelUser();
			$table = $p->dangky($tk,$mk);
			if($table){
				return 1;	
			}else{
				return 0; 
			}
			
		}
		
		function dangnhaptk($tk,$mk){	
			$p = new modelUser();
			$table = $p->dangnhap($tk,$mk);
			return $table;
		}
	}
