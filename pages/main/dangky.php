<?php
if (isset($_POST['dangky'])) {
	$tentaikhoan = $_POST['tentaikhoan'];
	$email = $_POST['email'];
	$dienthoai = $_POST['dienthoai'];
	$matkhau = ($_POST['matkhau']);
	$sql_dangky = mysqli_query($conn, "INSERT INTO users(tentaikhoan,email,matkhau,dienthoai) VALUE('" . $tentaikhoan . "','" . $email . "','" . $matkhau . "','" . $dienthoai . "')");
	if ($sql_dangky) {
		echo '<p style="color:green">Bạn đã đăng ký thành công</p>';
		$_SESSION['dangky'] = $tentaikhoan;
		$_SESSION['email'] = $email;
		$_SESSION['id_users'] = mysqli_insert_id($conn);
	}
}
?>
<p>Đăng ký thành viên</p>
<style type="text/css">
	table.dangky tr td {
		padding: 5px;
	}
</style>
<form action="" method="POST">
	<table class="dangky" border="1" width="50%" style="border-collapse: collapse;">
		<tr>
			<td>Tên tài khoản</td>
			<td><input type="text" size="50" name="tentaikhoan" required></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" size="50" name="email" required></td>
		</tr>
		<tr>
			<td>Điện thoại</td>
			<td><input type="text" size="50" name="dienthoai"></td>
		</tr>
		<tr>
			<td>Mật khẩu</td>
			<td><input type="text" size="50" name="matkhau" required></td>
		</tr>
		<tr>

			<td><input type="submit" name="dangky" value="Đăng ký"></td>
			<td><a href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a></td>
		</tr>
	</table>

</form>