<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="CSS/style.css">
	<title>Admin</title>
</head>
<table border="1" style="width:960px;text-align:center;margin: auto;">
	<tr>
		<td colspan="2">
			<img src="image/images.jpg" width="100%" height="350px">
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<ul class="admin">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li class="active">
					<a href="admin.php">Quản lý sản phẩm</a>
				</li>
				<li style="float:right">
					<?php
					if ($_SESSION["login"]) {
						echo '<a href="admin.php?dangxuat">Đăng xuất</a>';
					}
					?>
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td class="menu" align="center">
			<div class="row">
				<div class="left" style="background-color:#bbb;">
					<h2>Menu</h2>
					<ul id="myMenu">
						<li>
							<a href="admin.php?addProd">Thêm sản Phẩm</a><br />
						</li>
						<li><a href="admin.php?showProd">Xem sản Phẩm</a><br /></li>
					</ul>
				</div>
			</div>

		</td>
		<td width="85%">
			<?php

			if (isset($_REQUEST["addProd"])) {
				include_once("View/Insert.php");
			} else if (isset($_REQUEST["showProd"])) {
				include_once("View/vAllProduct.php");
			} else if (isset($_REQUEST["updateProd"])) {
				include_once("View/vUpdateProduct.php");
			} else if (isset($_REQUEST["deleteProd"])) {
				include_once("View/vdeleteProduct.php");
			}
			//
			else if (isset($_REQUEST["dangky"])) {
				include_once("View/dangky.php");
			} else if (isset($_REQUEST["dangxuat"])) {
				include_once("View/DangXuat.php");
			}
			//
			else {
				if ($_SESSION["login"]) {
					echo "Đăng nhập thành công tài khoản " . $_SESSION["login"];
				} else {
					include_once("View/DangNhap.php");
				}
			}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<h3>Đây là trang web cá nhân</h3>
			<h4>Luyện tập và nâng cao kỹ năng lập trình</h4>
		</td>
	</tr>
</table>

<body>
</body>

</html>