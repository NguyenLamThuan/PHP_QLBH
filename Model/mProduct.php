<?php
include_once("Ketnoi.php");
class modelProduct
{
	public $conn;

	function SelectAllProductByCompany($Comp)
	{
		$this->conn;
		$p = new ketnoiDB();
		if ($p->ketnoi($conn)) {
			$string = "select * from sanpham where id_congty = " . $Comp;
			$table = mysqli_query($conn, $string);
			$p->dongketnoi($conn);
			return $table;
		} else {
			return false;
		}
	}
	function InsertProduct($ten, $giamgia, $gia, $mota, $cty, $file, $name, $type, $size)
	{
		$this->conn;
		$p = new ketnoiDB();
		if ($p->ketnoi($conn)) {
			$string = "insert into sanpham(tensanpham, gia, giamgia, mota, hinh, id_congty) values ";
			$string .= "(N'" . $ten . "'," . $gia . "," . $giamgia . ",N'" . $mota . "',N'" . $name . "'," . $cty . ")";
			$kq = mysqli_query($conn, $string);
			$p->dongketnoi($conn);
			return $kq;
		} else {
			return false;
		}
	}
	function SelectAllProduct()
	{
		$this->conn;
		$p =  new ketnoiDB();
		if ($p->ketnoi($conn)) {
			$string = "select * from sanpham";
			$table = mysqli_query($conn, $string);
			$p->dongketnoi($conn);
			return $table;
		}
	}
	function SelectProductById($id)
	{
		$this->conn;
		$p = new ketnoiDB();
		if ($p->ketnoi($conn)) {
			$string = "select * from sanpham where id_sanpham = " . $id;
			$table = mysqli_query($conn, $string);
			$p->dongketnoi($conn);
			return $table;
		}
	}
	function UpdateProduct($id, $ten, $giamgia, $gia, $mota, $cty, $file, $name, $type, $size)
	{
		$this->conn;
		$p = new ketnoiDB();
		if ($p->ketnoi($conn)) {
			$string = "UPDATE sanpham
				SET tensanpham = N'" . $ten . "',gia=" . $gia . ", giamgia = " . $giamgia . ", mota = N'" . $mota . "', hinh=N'" . $name . "',id_congty = " . $cty . "
				 where id_sanpham = " . $id . ";";
			$kq = mysqli_query($conn, $string);
			$p->dongketnoi($conn);
			return $kq;
		} else {
			return false;
		}
	}
	function DeleteProduct($idsp)
	{
		$this->conn;
		$p = new ketnoiDB();
		if ($p->ketnoi($conn)) {
			$string = "delete from sanpham where id_sanpham = " . $idsp;
			$table = mysqli_query($conn, $string);
			$p->dongketnoi($conn);
			return $table;
		}
	}
	function SearchProduct($ten)
	{
		$this->conn;
		$p = new ketnoiDB();
		if ($p->ketnoi($conn)) {
			$string = "select * from sanpham where  tensanpham like '%" . $ten . "%'";
			$table = mysqli_query($conn, $string);
			$p->dongketnoi($conn);
			return $table;
		}
	}
}
