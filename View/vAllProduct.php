<?php
if (!isset($_SESSION)) {
	session_start();
}
if (!$_SESSION["login"]) {
	echo header("location: admin.php");
}
?>
<table border='1' style="width: 100%;">
	<tr>
		<th>STT</th>
		<th>Tên sp</th>
		<th>Giá</th>
		<th>Giảm Giá</th>
		<th>Mô tả</th>
		<th>Image</th>
	</tr>
	<?php
	include_once("Controller/cProduct.php");
	$p = new controlProduct();
	$tblProduct = $p->GetAllProduct();
	$i = 1;
	if ($tblProduct) {
		if (mysqli_num_rows($tblProduct)) {
			while ($rows = mysqli_fetch_assoc($tblProduct)) {
				echo '<tr>';
				echo '<td>' . $i++ . '</td>';
				echo '<td>' . $rows["tensanpham"] . '</td>';
				echo '<td>' . $rows["gia"] . '$</td>';
				echo '<td>' . $rows["giamgia"] . '$</td>';
				echo '<td>' . $rows["mota"] . '</td>';
				echo '<td>' . "<img width = '100px' height='100px' src='image/" . $rows["hinh"] . "'/>" . '</td>';
				echo '<td> 
					<button><a style="text-decoration: none" href="admin.php?deleteProd=' . $rows["id_sanpham"] . '">Xóa</a></button>
					<button style="margin-top: 5px"><a style="text-decoration: none" href="admin.php?updateProd=' . $rows["id_sanpham"] . '">Sửa</a></button>
					</td>';
				echo '</tr>';
			}
		}
	} else {
		echo "error";
	}
	?>
</table>