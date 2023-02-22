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
	<div>
		<div>
			<?php require 'Layout/header.php' ?>
		</div>
		<div>
			<?php require 'Layout/menu.php' ?>
		</div>
		<div class="main" style="margin-bottom: 0px;">
			<table style="width: 100%">
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
					<td style="width:80%" align="center">
						<?php
						if (isset($_REQUEST["searchProd"])) {
							include_once("View/vSearchProduct.php");
						} else if (isset($_REQUEST["Comp"])) {
							include_once("View/vProduct.php");
						} else {
							include_once('View/vPrdHome.php');
						}

						?>
					</td>
				</tr>
			</table>
		</div>
		<div align='center'>
			<?php require 'Layout/footer.php' ?>
		</div>
	</div>

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