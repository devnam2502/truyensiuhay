<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Kiểm tra xem truyen_id có được truyền qua phương thức POST không
  if (isset($_POST['truyen_id'])) {
    $truyenId = $_POST['truyen_id'];
    $userId = $_SESSION['user_id'];

    // Xóa dữ liệu theo dõi từ bảng theodoi
    $sql = "DELETE FROM theodoi WHERE user_id = $userId AND truyen_id = $truyenId";
    $result = $conn->query($sql);

    if ($result) {
      // Hiển thị thông báo thành công và liên kết trở lại trang trước đó
      echo "Đã hủy theo dõi truyện thành công. <a href='javascript:history.back()'>Quay lại</a>";
    } else {
      // Hiển thị thông báo lỗi
      echo "Đã xảy ra lỗi khi hủy theo dõi truyện.";
    }
  }
}
?>
