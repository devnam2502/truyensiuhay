<?php
	if(isset($_POST['dangnhap'])){
		$email = $_POST['email'];
		$matkhau = ($_POST['password']);
		$sql = "SELECT * FROM users WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
		$row = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($row);

		if($count>0){
			$row_data = mysqli_fetch_array($row);
			$_SESSION['dangky'] = $row_data['tentaikhoan'];
			$_SESSION['email'] = $row_data['email'];
			$_SESSION['role'] = $row_data['role'];
			$_SESSION['user_id'] = $row_data['id_users'];
			$_SESSION['loggedin'] = true;
			if ($row_data['role'] == 'admin') {
				echo '<p style="color:black"> Nhấn <a href="admincp/admin.php"> để vào trang admin </a></p>';
				exit();	
			} else {
				echo '<p style="color:black"> Nhấn <a href="index.php">trang chủ</a> để tiếp tục';
				exit();
			}
		}else{
			echo '<p style="color:red">Mật khẩu hoặc Email sai ,vui lòng nhập lại.</p>';
			
		}
	} 
?>
<form action="" autocomplete="off" method="POST">
		<table border="1" width="50%" class="table-login" style="text-align: center;border-collapse: collapse;">
			<tr>
				<td colspan="2"><h3>Đăng nhập</h3></td>
			</tr>
			<tr>
				<td>Tài khoản</td>
				<td><input type="text" size="50" name="email" placeholder="Email..."></td>
			</tr>
			<tr>
				<td>Mật khẩu</td>
				<td><input type="password" size="50" name="password" placeholder="Mật khẩu..."></td>
			</tr>
			<tr>
				
				<td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
			</tr>
	</table>
	</form>