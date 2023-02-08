<?php
	include_once("Model/mProduct.php");
	class controlProduct{
		function GetAllProductByCompany($Comp){
			$p = new modelProduct();
			$table= $p->SelectAllProductByCompany($Comp);
						
			return $table;
		}
		function AddProduct($ten,$giamgia, $gia, $mota, $cty, $file, $name, $type, $size) {
			if($type == "image/jpeg" || $type == "image/png") {
				if($size <= 2*1024*1024) {
					if(move_uploaded_file($file, "image/" . $name)) {
						$p = new modelProduct();
						$ins = $p->InsertProduct($ten, $giamgia, $gia, $mota, $cty, $file, $name, $type, $size);
						if($ins) {
							return 1;
						} else {
							return 0;
						}
					} else {
						return -1;
					}
				} else {
					return -2; 
				} 
			} else {
				return -3; 
			}
		}
		
		function GetAllProduct(){	
			$p = new modelProduct();
			$table = $p->SelectAllProduct();
			return $table;
		}
		function GetProductById($id){
			$p = new modelProduct();
			$table = $p->SelectProductById($id);
			return $table;	
		}
		function UpdateProductById($id,$ten, $giamgia, $gia, $mota, $cty, $file, $name, $type, $size) {
			if($type == "image/jpeg" || $type == "image/png") {
				if($size <= 2*1024*1024) {
					if(move_uploaded_file($file, "image/" . $name)) {
						$p = new modelProduct();
						$ins = $p->UpdateProduct($id,$ten, $giamgia, $gia, $mota, $cty, $file, $name, $type, $size);
						if($ins) {
							return 1;
						} else {
							return 0;
						}
					} else {
						return -1;
					}
				} else {
					return -2; 
				} 
			} else {
				return -3; 
			}
		}
		function DeleteProductById($idsp){
			$p = new modelProduct();
			$table = $p->DeleteProduct($idsp);
			return $table;	
		}
		function SearchProductByTen($ten){
			$p = new modelProduct();
			$table= $p->SearchProduct($ten);
						
			return $table;
		}
		
	}
?>