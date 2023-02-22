<?php
//session_start();
if (!isset($_SESSION)) {
	session_start();
}
if (!$_SESSION["login"]) {
	echo header("location: admin.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>
<?php
include_once("Controller/cProduct.php");

if (isset($_REQUEST["btnsubmit"])) {
	$ten = $_REQUEST["txtTenSP"];
	$gia = $_REQUEST["txtGiaSP"];
	$giamgia = $_REQUEST["txtGiamGiaSP"];
	$mota = $_REQUEST["txtMota"];
	$cty = $_REQUEST["cboCty"];
	$file = $_FILES["ffile"]["tmp_name"];
	$type = $_FILES["ffile"]["type"];
	$name = $_FILES["ffile"]["name"];
	$size = $_FILES["ffile"]["size"];
	if ($giamgia < $gia) {
		$p = new controlProduct();

		$kq = $p->AddProduct($ten, $giamgia, $gia, $mota, $cty, $file, $name, $type, $size);

		if ($kq == 1) {
			echo "<script>alert('Thêm dữ liệu thành công')</script>";
			echo header("refresh: 0; url='index.php?Prod'");
		} else if ($kq == 0) {
			echo "<script>alert('Không thể insert')</script>";
		} else if ($kq == -1) {
			echo "<script>alert('Không thể upload ảnh')</script>";
		} else if ($kq == -2) {
			echo "<script>alert('Size > 2MB')</script>";
		} else if ($kq == -3) {
			echo "<script>alert('Không đúng định dạng')</script>";
		} else {
			echo "Lỗi không xác định";
		}
	} else {
		echo "<script>alert('Gia giam phai nho hon gia goc')</script>";
	}
}
?>

<body>
	<div>
		<h2>THÊM SẢN PHẨM</h2>
		<form action="#" method="post" enctype="multipart/form-data">

			<table style="margin: auto; text-align: left">
				<tr>
					<td>Công ty cung cấp</td>
					<td>
						<select name="cboCty">
							<?php
							include("Controller/cCompany.php");
							$p = new controllerCompany();
							$tblCompany = $p->getCompany();
							if (mysqli_num_rows($tblCompany) > 0) {
								while ($row = mysqli_fetch_assoc($tblCompany)) {
									echo "<option value='" . $row["id_congty"] . "'>" . $row["tencongty"] . "</option>";
								}
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Nhập tên sản phẩm</td>
					<td><input type="text" name="txtTenSP" required></td>
				</tr>
				<tr>
					<td>Nhập giá sản phẩm</td>
					<td><input type="number" name="txtGiaSP" required></td>
				</tr>
				<tr>
					<td>Nhập giá được giảm</td>
					<td><input type="number" name="txtGiamGiaSP" required></td>
				</tr>
				<tr>
					<td>Mô tả</td>
					<td><textarea rows="5" cols="22" name="txtMota"></textarea></td>
				</tr>

				<tr>
				<tr>
					<td>Hình đại điện</td>
					<td><input type="file" name="ffile" required</td>
				</tr>

				<td></td>
				<td>
					<input type="submit" name="btnsubmit" value="Thêm">
					<input type="reset" value="Nhập lại">
				</td>
				</tr>
			</table>
		</form>
	</div>

</body>

</html>