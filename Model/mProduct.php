<?php
	include_once("Ketnoi.php");
	class modelProduct{
		function SelectAllProductByCompany($Comp){ 
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$string = "select * from sanpham where id_congty = ".$Comp;	
				$table = mysql_query($string);
				$p->dongketnoi($con);
				return $table;
			}else{
				return false;	
			}
			
		}
		function InsertProduct($ten, $giamgia, $gia, $mota, $cty, $file, $name, $type, $size) {
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$string = "insert into sanpham(tensanpham, gia, giamgia, mota, hinh, id_congty) values ";
				$string .= "(N'".$ten."',".$gia.",".$giamgia.",N'".$mota."',N'".$name."',".$cty.")";
				$kq = mysql_query($string);
				$p->dongketnoi($con);
				return $kq;
			} else {
				return false;
			}
		}
		function SelectAllProduct(){
			$con;
			$p =  new ketnoiDB();
			if($p->ketnoi($con)){
				$string = "select * from sanpham";
				$table = mysql_query($string);
				$p->dongketnoi($con);
				return $table;	
			}	
		}
		function SelectProductById($id){
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$string = "select * from sanpham where id_sanpham = ".$id;	
				$table = mysql_query($string);
				$p->dongketnoi($con);
				return $table;
			}
		}
		function UpdateProduct($id,$ten, $giamgia, $gia, $mota, $cty, $file, $name, $type, $size) {
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$string = "UPDATE sanpham
				SET tensanpham = N'".$ten."',gia=".$gia.", giamgia = ".$giamgia.", mota = N'".$mota."', hinh=N'".$name."',id_congty = ".$cty."
				 where id_sanpham = ".$id.";";
				$kq = mysql_query($string);
				$p->dongketnoi($con);
				return $kq;
			} else {
				return false;
			}
		}
		function DeleteProduct($idsp){
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$string = "delete from sanpham where id_sanpham = ".$idsp;	
				$table = mysql_query($string);
				$p->dongketnoi($con);
				return $table;
			}
		}
		function SearchProduct($ten){
			$con;
			$p = new ketnoiDB();
			if($p->ketnoi($con)){
				$string = "select * from sanpham where  tensanpham like '%".$ten."%'";	
				$table = mysql_query($string);
				$p->dongketnoi($con);
				return $table;
			}
		}
	}
?>