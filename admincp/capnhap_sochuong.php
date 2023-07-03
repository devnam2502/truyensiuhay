<?php
include('config.php');

// Kiểm tra xem truyen_id đã được truyền qua URL hay chưa
if (isset($_GET['truyen_id'])) {
    $truyen_id = $_GET['truyen_id'];

    // Lấy số chương cao nhất từ bảng chapter
    $sql = "SELECT MAX(soThuTu) AS so_chuong_max FROM chapter WHERE truyen_id = '$truyen_id'";
    $result_chapter = mysqli_query($conn, $sql);
    if (!$result_chapter) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
        }

    $row_chapter = mysqli_fetch_assoc($result_chapter);
    $so_chuong_max = $row_chapter['so_chuong_max'];

    // Tăng giá trị so_chuong_max lên 1
    $so_chuong_moi = $so_chuong_max + 1;

    // Thêm dòng mới vào bảng chapter
    $sql_insert = "INSERT INTO chapter (truyen_id, soThuTu) VALUES ('$truyen_id', '$so_chuong_moi')";
    $result_insert = mysqli_query($conn, $sql_insert);

    // Cập nhật giá trị so_chuong trong bảng truyen
    $sql_update = "UPDATE truyen SET so_chuong = '$so_chuong_moi' WHERE truyen_id = '$truyen_id'";
    $result_update = mysqli_query($conn, $sql_update);

    if ($result_insert && $result_update) {
        echo "Cập nhật số chương thành công!";
        echo '<a href="admin.php">Quay lại để tiếp tục.</a>';
    } else {
        echo "Cập nhật số chương thất bại!";
    }
} else {
    echo "Không tìm thấy truyen_id!";
}
?>
