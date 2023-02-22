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
if (isset($_REQUEST["deleteProd"])) {
	$id = $_REQUEST["deleteProd"];
	$tblProduct = $p->GetProductById($id);
}
if ($tblProduct) {
	$rows = mysqli_fetch_assoc($tblProduct);
}
?>

<h2>Xóa sản phẩm</h2>
<form action="" method="post" enctype="multipart/form-data">
	<table width="100%">
		<tr>
			<td>Bạn có chắc chắn muốn xóa sản phẩm "<?php echo $rows["tensanpham"] ?>" không ???</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="btnsubmit" value="Xóa" />
				<input type="submit" name="quaylai" value="Quay Lại" />
			</td>
		</tr>
	</table>
</form>

<?php
include_once("Controller/cProduct.php");
$p = new controlProduct();
if (isset($_REQUEST["btnsubmit"])) {
	$idsp = $rows["id_sanpham"];
	$table = $p->DeleteProductById($idsp);
	if ($table) {
		echo "<script>alert('Xóa thành công')</script>";
		echo header("refresh:0;url ='admin.php?showProd'");
	} else {
		echo "<script>alert('Xóa không thành công')</script>";
	}
}
if (isset($_REQUEST["quaylai"])) {
	echo header("refresh:0;url ='admin.php?showProd'");
}
?>