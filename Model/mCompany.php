<?php
include_once("Ketnoi.php");
class modelCompany
{
	public $conn;
	function selectCompany()
	{
		$this->conn;
		$p = new ketnoiDB();
		if ($p->ketnoi($conn)) {
			$query = "select * from congty";
			$table = mysqli_query($conn, $query);
			$p->dongketnoi($conn);
			return $table;
		} else {
			return false;
		}
	}
	function selectCompanyById($id)
	{
		$this->conn;
		$p = new ketnoiDB();
		if ($p->ketnoi($conn)) {
			$query = "select * from congty where id_congty =" . $id;
			$table = mysqli_query($conn, $query);
			$p->dongketnoi($conn);
			return $table;
		} else {
			return false;
		}
	}
}
