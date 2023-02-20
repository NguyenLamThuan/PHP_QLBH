<?php
class ketnoiDB
{
	function ketnoi(&$conn)
	{
		$conn = new mysqli("localhost", "usertest", "123", "databasetest");

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		mysqli_set_charset($conn, 'utf8');
		return $conn;
	}
	function dongketnoi($conn)
	{
		$conn->close();
	}
}
