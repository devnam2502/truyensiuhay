<?php
// Xóa tất cả các biến phiên làm việc
$_SESSION = array();

// Hủy phiên làm việc
session_destroy();

// Chuyển hướng người dùng về trang đăng nhập hoặc trang chính (tùy theo yêu cầu của bạn)
echo '<p>Đăng xuất thành công</p> <br>';
echo '<a href="index.php"><p>Quay lại trang chủ</p></a>';

exit;
?>