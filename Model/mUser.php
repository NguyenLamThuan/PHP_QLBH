<?php
include_once("Ketnoi.php");
class modelUser
{
	public $conn;
	function dangky($tk, $mk)
	{
		$this->conn;
		$p = new ketnoiDB();
		if ($p->ketnoi($conn)) {
			$string = "insert into taikhoan(UserName ,PassWord) values";
			$string .= "(N'" . $tk . "',N'" . $mk . "')";
			$table = mysqli_query($conn, $string);
			$p->dongketnoi($conn);
			return $table;
		} else {
			return false;
		}
	}
	function dangnhap($tk, $mk)
	{
		$this->conn;
		$p = new ketnoiDB();
		if ($p->ketnoi($conn)) {
			$string = "SELECT * FROM taikhoan where UserName = '$tk' and PassWord = '$mk'";
			$table = mysqli_query($conn, $string);
			$p->dongketnoi($conn);
			return $table;
		}
	}
}
