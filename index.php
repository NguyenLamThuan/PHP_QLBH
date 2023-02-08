<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="CSS/style.css">
	<title>Home</title>
</head>

<body>
	<table border="1" style="width:960px;text-align:center;margin: auto;">
		<tr>
			<td colspan="2">
				<img src="image/images.jpg" width="100%" height="350px">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<ul class="admin">

					<li class="active">
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="admin.php">Quản lý sản phẩm</a>
					</li>
				</ul>


			</td>
		</tr>
		<tr>
			<td class="menu" align="center">
				<div class="row">
					<div class="left" style="background-color:#bbb;">
						<h2>Menu</h2>
						<form><input type="text" name="search" placeholder="Tìm kiếm...." required />
							<input type="submit" class="search" name="submit" value="Tìm kiếm" />
						</form>
						<ul id="myMenu">
							<li>
								<?php
								include_once("View/vCompany.php");
								?>
							</li>
						</ul>
					</div>
				</div>


			</td>
			<td width="85%">
				<?php
				if (isset($_REQUEST["searchProd"])) {
					include_once("View/vSearchProduct.php");
				} else {
					include_once("View/vProduct.php");
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

</body>

</html>
<?php
if (isset($_REQUEST["submit"])) {
	if ($_REQUEST["search"] != "") {
		$search = $_REQUEST["search"];
		$_SESSION["timkiem"] = $_REQUEST["search"];
		echo header("refresh:0;url='index.php?searchProd=" . $search . "'");
	} else {
		echo header("location: index.php");
	}
}
?>