<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<h2>Đăng Nhập</h2>
<form action="#" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>UserName</td>
			<td><input type="text" name="tkdn" required="required" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="pwdn" required="required" /></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="reset" name="reset" value="Nhập Lại" />
				<input type="submit" name="submit" value="Đăng Nhập" />
			</td>
		</tr>
		<tr>
			<td></td>
			<td><a href="admin.php?dangky">Đăng ký</a></td>
		</tr>
	</table>
</form>
<?php
include_once("Controller/cUser.php");
if (isset($_REQUEST["submit"])) {
	$tk = $_REQUEST["tkdn"];
	$mk = md5($_REQUEST["pwdn"]);
	$p = new controlUser();
	$table = $p->dangnhaptk($tk, $mk);
	if ($table) {
		if (mysqli_num_rows($table) > 0) {
			$_SESSION["login"] = $tk;
			echo "<script>alert('Đăng nhập thành công')</script>";

			echo header("refresh: 0; url='admin.php'");
		} else {
			echo "<script>alert('Sai tài khoản hoặc mật khẩu')</script>";
		}
	} else {
		echo "Lỗi";
	}
}

?>