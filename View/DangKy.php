<?php
session_start();
if ($_SESSION["login"]) {
	echo header("location: admin.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>

<body>
	<h2>Đăng ký</h2>
	<form action="#" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>UserName</td>
				<td><input type="text" name="tk" required="required" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="pw" required="required" /></td>
			</tr>
			<tr>
				<td>Nhập lại password</td>
				<td><input type="password" name="npw" required="required" /></td>
			</tr>
			<tr>
				<td><input type="reset" name="reset" value="Nhập Lại" /></td>
				<td><input type="submit" name="submit" value="Đăng Ký" /></td>
			</tr>
		</table>
	</form>
</body>

</html>
<?php
include_once("Controller/cUser.php");
if (isset($_REQUEST["submit"])) {
	$tk = $_REQUEST["tk"];
	$mk = md5($_REQUEST["pw"]);
	$nmk = md5($_REQUEST["npw"]);
	if ($mk == $nmk) {
		$p = new controlUser();
		$kq = $p->dangkytk($tk, $mk);
		if ($kq == 1) {
			echo "<script>alert('Thêm dữ liệu thành công')</script>";
			echo header("refresh: 0; url='admin.php'");
		} else if ($kq == 0) {
			echo "<script>alert('Không thể thêm')</script>";
		}
	} else {
		echo "<script>alert('sai password')</script>";
	}
}
?>