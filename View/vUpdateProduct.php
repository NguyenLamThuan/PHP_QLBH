<?php
if (!isset($_SESSION)) {
	session_start();
}
if (!$_SESSION["login"]) {
	echo header("location: admin.php");
}
?>
<?php
include_once("Controller/cProduct.php");
$p = new controlProduct();
if (isset($_REQUEST["updateProd"])) {
	$id = $_REQUEST["updateProd"];
	$tblProduct = $p->GetProductById($id);
}
if ($tblProduct) {
	$rows = mysqli_fetch_assoc($tblProduct);
}
?>

<body>
	<form action="" method="post" enctype="multipart/form-data">
		<table style="margin: auto; text-align: left" border="1">
			<tr>
				<td>ID sản phẩm</td>
				<td><input type="number" value=<?php echo "'" . $rows["id_sanpham"] . "'" ?> name="txtid" readonly /></td>
			</tr>
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

								if ($row["id_congty"] == $rows["id_congty"]) {
									echo "<option value='" . $row["id_congty"] . "' selected>" . $row["tencongty"] . "</option>";
								} else {
									echo "<option value='" . $row["id_congty"] . "'>" . $row["tencongty"] . "</option>";
								}
							}
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Nhập tên sản phẩm</td>
				<td><input type="text" name="txtTenSP" value=<?php echo "'" . $rows["tensanpham"] . "'" ?> required></td>
			</tr>
			<tr>
				<td>Nhập giá sản phẩm</td>
				<td><input type="number" name="txtGiaSP" value=<?php echo "'" . $rows["gia"] . "'" ?> required></td>
			</tr>
			<tr>
				<td>Nhập giá được giảm</td>
				<td><input type="number" name="txtGiamGiaSP" value=<?php echo "'" . $rows["giamgia"] . "'" ?> required></td>
			</tr>
			<tr>
				<td>Mô tả</td>
				<td><textarea rows="5" cols="22" name="txtMota"><?php echo $rows["mota"] ?></textarea></td>
			</tr>

			<tr>
			<tr>
				<td>Hình đại điện</td>
				<td><input type="file" name="ffile" required</td>
			</tr>
			<td></td>
			<td>
				<input type="submit" name="btnsubmit" value="Sửa">
				<input type="reset" value="Nhập lại">
			</td>
			</tr>
		</table>
	</form>
	<?php
	include_once("Controller/cProduct.php");

	if (isset($_REQUEST["btnsubmit"])) {
		$id = $_REQUEST["txtid"];
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

			$kq = $p->UpdateProductById($id, $ten, $giamgia, $gia, $mota, $cty, $file, $name, $type, $size);
			if ($kq == 1) {
				echo "<script>alert('sửa dữ liệu thành công')</script>";
				echo header("refresh: 0; url='index.php?Prod'");
			} else if ($kq == 0) {
				echo "<script>alert('Không thể sửa')</script>";
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