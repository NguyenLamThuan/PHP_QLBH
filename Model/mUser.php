<?php
	include_once("Ketnoi.php");
	class modelUser{
		function dangky($tk,$mk){
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){ 
			$string = "insert into taikhoan(UserName ,PassWord) values";
			$string .= "(N'".$tk."',N'".$mk."')";
			$table = mysql_query($string);
			$p->dongketnoi($con);
			return $table;
			}	
			else { 
				return false;
			}
		}
		function dangnhap($tk,$mk){
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){ 
				$string = "SELECT * FROM taikhoan where UserName = '$tk' and PassWord = '$mk'";
				$table = mysql_query($string);
				$p->dongketnoi($con);
				return $table;
			}
		}	
	}
?>